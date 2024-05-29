<?php
// src/controllers/AuthController.php

namespace Controllers;



use Models\User;
use Controllers\ResultController;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
;

require './config/Mail.php';

class AuthController extends ResultController {
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password']; // On garde le mot de passe en clair pour la vérification

            $loggedInUser = $user->login() ?? null;
            if ($loggedInUser) {
                $_SESSION['user_id'] = $loggedInUser['id'];
                $_SESSION['username'] = $loggedInUser['nickname']; // Utiliser le pseudo comme nom d'utilisateur
                header("Location: /index.php"); // Rediriger vers la page d'accueil
                exit(); // Assurez-vous de sortir après la redirection
            } else {
                $this->view('login', ['error' => 'Invalid login credentials']);
            }
        } else {
            $this->view('login');
        }
    }

    public function register() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->firstname = $_POST['firstname'];
            $user->lastname = $_POST['lastname'];
            $user->nickname = $_POST['nickname'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password']; // On garde le mot de passe en clair pour le hachage

            if ($user->register()) {
                // Appeler la méthode pour envoyer l'email de confirmation
                $this->sendConfirmationEmail($user->email, $user->firstname, $user->lastname);
                header("Location: /login");
                exit(); // Assurez-vous de sortir après la redirection
            } else {
                $this->view('register', ['error' => 'Registration failed']);
            }
        } else {
            $this->view('register');
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /index.php");
        exit();
    }

    private function sendConfirmationEmail($email, $firstname, $lastname)
    {
        // Charger la configuration SMTP
        $config = require './config/mail.php';

        // Créer une instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Activer le débogage SMTP
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Niveau de débogage (0 = off, 1 = client, 2 = client et serveur)
            $mail->Debugoutput = 'html'; // Sortie du débogage

            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = $config['host'];
            $mail->SMTPAuth = $config['smtp_auth'];
            $mail->Username = $config['username'];
            $mail->Password = $config['password'];
            $mail->SMTPSecure = $config['smtp_secure'];
            $mail->Port = $config['port'];

            // Paramètres de l'email
            $mail->setFrom($config['from_email'], $config['from_name']);
            $mail->addAddress($email, $firstname . ' ' . $lastname); // Adresse de l'utilisateur

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = 'Inscription réussie'; // Sujet de l'email
            $mail->Body = 'Merci de vous être inscrit sur notre site !'; // Corps de l'email en HTML
            $mail->AltBody = 'Merci de vous être inscrit sur notre site !'; // Corps de l'email en texte brut

            // Envoyer l'email
            $mail->send();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            error_log("Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}");
        }
    }
}
?>
