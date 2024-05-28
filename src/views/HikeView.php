<?php
namespace Views;

class HikeView {
    public static function displayHikes($hikes) {
        echo "<h1>List of Hikes</h1>";
        echo "<ul>";
        foreach ($hikes as $hike) {
            echo "<li><a href='/hike/{$hike['id']}'>{$hike['name']}</a> - Distance: {$hike['distance']} km, Duration: {$hike['duration']} hours, Elevation Gain: {$hike['elevation_gain']} m</li>";
        }
        echo "</ul>";
    }

    public static function displayHikeDetails($hike) {
        echo "<h1>{$hike['name']}</h1>";
        echo "<p>Distance: {$hike['distance']} km</p>";
        echo "<p>Duration: {$hike['duration']} hours</p>";
        echo "<p>Elevation Gain: {$hike['elevation_gain']} m</p>";
        echo "<p>Description: {$hike['description']}</p>";
        echo "<p>Created by: {$hike['creator_name']}</p>";
        echo "<p>Tags: " . implode(", ", $hike['tags']) . "</p>";
        echo "<a href='/'>Back to list</a>";
    }
}
?>
