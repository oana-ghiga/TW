<?php
session_start();

echo "Hello World!";

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

    $phpVariable = "Haha Suckers";
    // Render the main page with shuffled plant images
    include 'main.php';
    echo "<script>var jsVariable = '" . $phpVariable . "';</script>";

} else {
    // Redirect to the login page
    header("Location: login_back.php");
    exit();
}
?>

<?php
//session_start();
//
//function getShuffledPlants()
//{
//    // Connect to the database
//    $conn = new mysqli('localhost', 'root', 'root', 'herbarium_db');
//
//    // Check the database connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//
//    // Fetch plants from the database
//    $sql = "SELECT plant_image FROM plants";
//    $result = $conn->query($sql);
//
//    $plants = array();
//
//    // Check if any plants were found
//    if ($result->num_rows > 0) {
//        // Store each plant in the $plants array
//        while ($row = $result->fetch_assoc()) {
//            $plants[] = $row['plant_image'];
//        }
//    }
//
//    // Close the database connection
//    $conn->close();
//
//    // Shuffle the plant array
//    shuffle($plants);
//
//    return $plants;
//}
//
//function getFilteredPlants($tags, $criteria)
//{
//    // Connect to the database
//    $conn = new mysqli('localhost', 'root', 'root', 'herbarium_db');
//
//    // Check the database connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//
//    // Construct the SQL query for filtering plants
//    $sql = "SELECT plant_image FROM plants WHERE";
//    $conditions = array();
//
//    // Add conditions for each tag
//    foreach ($tags as $tag) {
//        $conditions[] = "tags LIKE '%$tag%'";
//    }
//
//    // Add conditions for each criteria
//    foreach ($criteria as $criterion) {
//        $conditions[] = "criteria LIKE '%$criterion%'";
//    }
//
//    // Join the conditions with 'AND' operator
//    $sql .= " " . implode(" AND ", $conditions);
//
//    // Fetch filtered plants from the database
//    $result = $conn->query($sql);
//
//    $plants = array();
//
//    // Check if any plants were found
//    if ($result->num_rows > 0) {
//        // Store each plant in the $plants array
//        while ($row = $result->fetch_assoc()) {
//            $plants[] = $row['plant_image'];
//        }
//    }
//
//    // Close the database connection
//    $conn->close();
//
//    return $plants;
//}
//
//if (isset($_SESSION['logged_in'])) {
//    $_SESSION['counter'] += 1;
//
//    // Check if search criteria were submitted
//    if (isset($_GET['tags']) && isset($_GET['criteria'])) {
//        // Retrieve the tags and criteria from the form submission
//        $tags = explode(',', $_GET['tags']);
//        $criteria = explode(',', $_GET['criteria']);
//
//        // Filter plants based on the submitted tags and criteria
//        $plants = getFilteredPlants($tags, $criteria);
//    } else {
//        // Fetch shuffled plant images from the database
//        $plants = getShuffledPlants();
//    }
//
//    // Render the main page with shuffled plant images
//    include 'index.php';
//} else {
//    // Redirect to the login page
//    header("Location: login_back.php");
//    exit();
//}
//?>
