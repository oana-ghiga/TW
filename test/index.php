<?php
session_start();


function getShuffledPlants()
{
    // Connect to database
    $conn = new mysqli('localhost', 'root', 'root', 'herbarium_db');

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch plants from the database
    $sql = "SELECT 'plant_image' FROM plants";
    $result = $conn->query($sql);

    $plants = array();

    // Check if any plants were found
    if ($result->num_rows > 0) {
        // Store each plant in the $plants array
        while ($row = $result->fetch_assoc()) {
            $plants[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    // Shuffle the plant array
    shuffle($plants);

    return $plants;
}

if (isset($_SESSION['logged_in'])) {
    $_SESSION['counter'] += 1;
    // Fetch shuffled plant images from the database
    $plants = getShuffledPlants();

    // Render the main page with shuffled plant images
    include 'main.php';

} else {
    // Redirect to the login page
    header("Location: login_back.php");
    exit();
}
?>


//<?php
//    echo "User is: ".$_SESSION["name"];
//
//?>
