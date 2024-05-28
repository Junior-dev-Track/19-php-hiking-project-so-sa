<?php
namespace Controllers;

use Models\Hike;
use Views\HikeView;

class HikeController {
    public function listHikes() {
        $hikes = Hike::getAllHikes();
        HikeView::displayHikes($hikes);
    }

    public function showHike($id) {
        $hike = Hike::getHikeById($id);
        HikeView::displayHikeDetails($hike);
    }

    public function listHikesByTag($tag) {
        $hikes = Hike::getHikesByTag($tag);
        HikeView::displayHikes($hikes);
    }
}
?>
