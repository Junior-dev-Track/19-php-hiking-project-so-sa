<?php
namespace App\Controllers;

require_once 'src/models/Hike.php';
require_once 'src/views/HikeView.php';

class HikeController {
    public function list() {
        $hikeModel = new \App\Models\Hike();
        $hikes = $hikeModel->getAllHikes();
        $hikeView = new \App\Views\HikeView();
        $hikeView->displayHikes($hikes);
    }

    public function about() {
        // Gérer la page "about"
    }
}
