<?php
namespace App\Views;

class HikeView {
    public function displayHikes($hikes) {
        foreach ($hikes as $hike) {
            echo "<h2>" . htmlspecialchars($hike['name']) . "</h2>";
            echo "<p>Tags: " . htmlspecialchars($hike['tags']) . "</p>";
            echo "<a href='/hike/" . $hike['id'] . "'>Voir les détails</a><br>";
        }
    }
}
