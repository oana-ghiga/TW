<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
    <title>HeMa</title>
</head>
<body>
<header class="headerLogged">
    <div class="headerContainer HC">
        <div class="headerContents HC">
            <div class="leftSide HC">
                <div class="logoContainer">
                    <a href="mainPage.html">
                        <img src="../images/logo.png" alt="logo" id="logo">
                    </a>
                </div>
            </div>
            <div class="rightSide HC">
                <div class="searchBarContainer HC">
                    <div class="searchBar">
                        <input type="text" placeholder="Search" id="searchBar">
                    </div>
                </div>
                <div class="searchButtonContainer HC">
                    <img src="../images/search-icon.png" alt="search" id="search">
                </div>
                <div class="filterButtonContainer HC">
                    <img src="../images/filter-button.png" alt="filter" id="filter">
                </div>
                <div class="aboutButtonContainer HC">
                    <p>About</p>
                </div>
                <div class="albumsButtonContainer HC">
                    <p>Albums</p>
                </div>
                <div class="profileButtonContainer HC">
                    <p>Profile</p>
                </div>
                <div class="logoutButtonContainer HC">
                    <p>Log out</p>
                </div>
                <div class="loginButtonContainer HC">
                    <p>Log in</p>
                </div>
                <div class="signupButtonContainer HC">
                    <p>Sign up</p>
                </div>
                <div class="dropdownContainer HC">
                    <div class="dropdownButton HC">
                        <img src="../images/dropdown-arrow.png" alt="dropdown-arrow" id="dropdown-arrow">
                    </div>
                    <div class="dropdownMenu shadow">
                        <div>
                            <a href="#" class="menuItem profile">Profile</a>
                            <a href="#" class="menuItem albums">Albums</a>
                            <a href="#" class="menuItem about">About</a>
                            <a href="#" class="menuItem logout">Logout</a>
                            <a href="#" class="menuItem login">Log in</a>
                            <a href="#" class="menuItem signup">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="filterMenuContainer shadow">
    <div class="filterMenu">
        <div class="category">
            <p>Color</p>
            <ul>
                <li>Red</li>
                <li>White</li>
                <li>Green</li>
                <li>Yellow</li>
                <li>Purple</li>
                <li>Orange</li>
            </ul>
        </div>
        <div class="category">
            <p>Type</p>
            <ul>
                <li>Medicinal</li>
                <li>Decorative</li>
            </ul>
        </div>
        <div class="category">
            <p>Climate</p>
            <ul>
                <li>Tropical</li>
                <li>Subtropical</li>
                <li>Cold</li>
                <li>Temperate</li>
            </ul>
        </div>
    </div>
</div>


<?php
$client_id = "6i4V8LkN5O6RNc67YOY4gssx0AFh2Urw738Xur2TKPY";
$per_page = 30;
$total_images = 60; //the bigger number, the laggier, so modify at your own risk xd
$query = "flower";
$pages = ceil($total_images / $per_page);

$images = array();
require_once "../functions.php";
for ($page = 1; $page <= $pages; $page++) {
    $url = "https://api.unsplash.com/search/photos?page=$page&per_page=$per_page&query=$query&client_id=$client_id";
    $result = json_decode(file_get_contents($url));
    dd(file_get_contents($url));
    $images = array_merge($images, $result->results);
}
$images = array_slice($images, 0, $total_images);

//album names array from storage, might have smt to do with db later
for ($i = 1; $i <= ceil($total_images / 4); $i++) {
    $albumNames[] = "Album " . $i;
}
?>

<div class="content">
    <div class="albumList">
        <div class="album">
            <?php foreach (array_chunk($images, 4) as $key => $values) { ?>
                <div class="albumBox-container">
                    <div class="albumBox-grid">
                        <?php foreach ($values as $value) {
                            $count = rand(1, 10);
                            ?>
                            <div class="albumBox-grid-item" data-count="+<?php echo $count; ?>">
                                <img src="<?php echo $value->urls->regular; ?>"
                                     alt="<?php echo $value->description; ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <h2><?php echo $albumNames[$key]; ?></h2>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="../javascript/script.js" type="text/javascript"></script>
</body>
</html>
