<?php
// Check if the form is submitted
$username = $_POST["username"];
$currentPassword = $_POST["current_password"];
$newPassword = $_POST["new_password"];
$confirmPassword = $_POST["confirm_password"];

// Verify that the new password and confirm password fields match
if ($newPassword !== $confirmPassword) {
    header('Location: /password');
    exit();
}

$user = Database::fetchOne("SELECT * FROM users WHERE username = ?", [$username]);

// compare with the old password
if (!password_verify($currentPassword, $user['password'])) {
    header('Location: /password?error=Invalid password');
    exit();
}

// update the password in the db
Database::execute("UPDATE users SET password = ? WHERE username = ?", [password_hash($newPassword, PASSWORD_DEFAULT), $username]);

// redirect to the main page
header('Location: /main');