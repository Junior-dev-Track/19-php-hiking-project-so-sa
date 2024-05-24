<?php
class HomeController {
    public function index() {
        echo "Welcome to the Home Page!";
    }

    public function about() {
        include __DIR__ . '/../View/about.php';
    }
}
?>
