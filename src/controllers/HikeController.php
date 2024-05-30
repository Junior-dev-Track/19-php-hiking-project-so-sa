<?php
namespace Controllers;

use Models\Hike;

class HikeController {
    public function listHikes() {
        $hikes = Hike::getAllHikes();
        \Views\HikeView::displayHikes($hikes);
    }

    public function showHike($id) {
        $hike = Hike::getHikeById($id);
        \Views\HikeView::displayHike($hike);
    }

    public function listHikesByTag($tag) {
        $hikes = Hike::getHikesByTag($tag);
        \Views\HikeView::displayHikes($hikes);
    }
}
?>
