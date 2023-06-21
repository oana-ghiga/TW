<?php
// Replace 'your_database_name' with your actual database name
$db = new mysqli('localhost', 'root', 'root', 'herbarium_db');

// Check for any connection errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Function to validate the input data
function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validateInput($_POST["username"]);
    $currentPassword = validateInput($_POST["current_password"]);
    $newPassword = validateInput($_POST["new_password"]);
    $confirmPassword = validateInput($_POST["confirm_password"]);

    // Verify that the new password and confirm password fields match
    if ($newPassword !== $confirmPassword) {
        echo "The new password and confirm password fields do not match.";
        exit;
    }

    // Hash and salt the new password before updating the database
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Prepare and execute the update query
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE username = ? AND password = ?");
    $stmt->bind_param("sss", $hashedPassword, $username, $currentPassword);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        echo "Password changed successfully.";
    } else {
        echo "Invalid username or current password.";
    }

    // Close the statement and database connection
    $stmt->close();
    $db->close();
}
?>

<!-- HTML form for the change password page -->
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
<h2>Change Password</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br><br>
    <label for="current_password">Current Password:</label>
    <input type="password" name="current_password" required><br><br>
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" required><br><br>
    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" name="confirm_password" required><br><br>
    <input type="submit" value="Change Password">
</form>
</body>
</html>
