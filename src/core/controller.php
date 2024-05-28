<?php
// src/core/Controller.php

namespace Core;

class Controller {
    public function view($view, $data = []) {
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
?>
