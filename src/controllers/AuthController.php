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
}
?>
