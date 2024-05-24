<?php
namespace App\Controllers;

use App\Models\Hike;

class HikeController {
    public function list() {
        $hikeModel = new Hike();
        $hikes = $hikeModel->getAllHikes();
        $hikeView = new \App\views\HikeView();
        $hikeView->displayHikes($hikes);
    }

    public function show($id) {
        $hikeModel = new Hike();
        $hike = $hikeModel->getHikeById($id);
        $hikeView = new \App\views\HikeView();
        $hikeView->displayHike($hike);
    }

    public function about() {
        // Gérer la page "about"
    }
}
