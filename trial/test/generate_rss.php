<?php
session_start();
require_once 'Database.php';
require_once 'functions.php';
// Database connection details

try {
    // Create a new PDO instance
    // Retrieve user information from the database
    $userId = $_SESSION['user_id']; // Assuming you have stored the user ID in the session
    // Retrieve the personalized leaderboards for the user's plants
    // rss feed only accessible by a logged-in user
    // contains a leaderboard of the user's plants (ranked by likes)
    // get all plants from the user
    // for each plant get its likes
    $query = "SELECT * FROM plant_user WHERE user_id = :userId";
    // Fetch the leaderboard data
    $plant_users = Database::fetchAll($query, [':userId' => $userId]);

    $leaderboard = [];

    foreach($plant_users as $plant_user) {
        $plantLikes = Database::fetchOne("SELECT likes, name FROM plants WHERE plant_id = :plantId", [':plantId' => $plant_user['plant_id']]);

        $leaderboard[] = [
            'plant_name' => $plantLikes['name'],
            'score' => $plantLikes['likes']
        ];
    }

    // Generate the RSS feed
    $rssFeed = '<?xml version="1.0" encoding="UTF-8"?>';
    $rssFeed .= '<rss version="2.0">';
    $rssFeed .= '<channel>';
    $rssFeed .= '<title>Personalized Leaderboards</title>';
    $rssFeed .= '<link>http://localhost:8080/albums.html</link>';
    $rssFeed .= '<description>Personalized leaderboards of user plants</description>';

    // Add item for each leaderboard entry
    foreach ($leaderboard as $entry) {
        $rssFeed .= '<item>';
        $rssFeed .= '<title>' . $entry['plant_name'] . '</title>';
        $rssFeed .= '<description> Number of likes: ' . $entry['score'] . '</description>';
        $rssFeed .= '</item>';
    }

    $rssFeed .= '</channel>';
    $rssFeed .= '</rss>';

    // Set the appropriate headers for the RSS feed
    header('Content-Type: application/rss+xml');
    header('Content-Disposition: attachment; filename="personalized_leaderboards.rss"');

    // Output the RSS feed
    echo $rssFeed;

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>