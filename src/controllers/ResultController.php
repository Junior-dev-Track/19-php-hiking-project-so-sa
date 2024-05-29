<?php
namespace Controllers;
use Models\User;


class ResultController {
    public function view($view, $data = []) {
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
// src/core/Controller.php




?>


