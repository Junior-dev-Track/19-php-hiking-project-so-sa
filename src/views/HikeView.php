<?php
namespace App\Views;

class HikeView {
    public function displayHikes($hikes) {
        foreach ($hikes as $hike) {
            echo "<h2><a href='/hike/" . $hike['id'] . "'>" . htmlspecialchars($hike['name']) . "</a></h2>";
            echo "<p>Tags: " . htmlspecialchars($hike['tags']) . "</p>";
        }
    }

    public function displayHike($hike) {
        echo "<h1>" . htmlspecialchars($hike['name']) . "</h1>";
        echo "<p>Created by: " . htmlspecialchars($hike['creator']) . "</p>";
        echo "<p>Tags: " . htmlspecialchars($hike['tags']) . "</p>";
        echo "<p>Description: " . htmlspecialchars($hike['description']) . "</p>";
        echo "<a href='/'>Back to list</a>";
    }
}
