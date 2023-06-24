<?php
// Clear all session variables
$_SESSION = null;

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: /login");
exit();