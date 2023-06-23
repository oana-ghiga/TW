<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login_back.php'); // Redirect to the login page
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <script>
        function goToUserProfile() {
            // Redirect to the user's profile page
            window.location.href = 'profile.php';
        }
    </script>
</head>
<body>
<h1>Welcome to the Main Page!</h1>

<!-- Button to go to the user profile -->
<button onclick="goToUserProfile()">User Profile</button>
</body>
</html>