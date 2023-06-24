<?php

// Retrieve user information from the database
$userId = $_SESSION['id'];
$query = "SELECT * FROM users WHERE user_id = :userId";

// Fetch the user data
$user = Database::fetchOne($query, [':userId' => $userId]);


view('profile', [
    'pageTitle' => 'User Profile',
    'user' => $user
]);