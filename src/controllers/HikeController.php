<?php
namespace Controllers;

use Models\Hike;
use Views\HikeView;

class HikeController {
    public function listHikes() {
        $hikes = Hike::getAllHikes();
        include 'src/views/header.php';
        HikeView::displayHikes($hikes);
    }

    public function showHike($id) {
        $hike = Hike::getHikeById($id);
        include 'src/views/header.php';
        HikeView::displayHikeDetails($hike);
    }

    public function listHikesByTag($tag) {
        $hikes = Hike::getHikesByTag($tag);
        include 'src/views/header.php';
        HikeView::displayHikes($hikes);
    }
}
?>
