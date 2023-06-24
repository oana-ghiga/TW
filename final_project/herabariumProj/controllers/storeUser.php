<?php

// Extract user information from the JSON data
$username = $_POST['username'];
$email = $_POST['email'];
$inpassword = $_POST['password'];

// Insert the user into the database
$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :inpassword)";
$hashedPassword = password_hash($inpassword, PASSWORD_DEFAULT);
$registerSuccessful = Database::execute($query, [':username' => $username, ':email' => $email, ':inpassword' => $hashedPassword]);

if ($registerSuccessful === TRUE) {
    // User registered successfully, send a success message to the frontend
    header('Location: /login');
} else {
    // Error occurred while registering the user, send an error message to the frontend
    header('Location: /register');
}
