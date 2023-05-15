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
                        <img alt="logo" id="logo" src="../images/logo.png">
                    </a>
                </div>
            </div>
            <div class="rightSide HC">
                <div class="searchBarContainer HC">
                    <div class="searchBar">
                        <input id="searchBar" placeholder="Search" type="text">
                        <button class="filterButton" type="button">
                            <img alt="filter" id="filterButton" src="../images/filter-button.png">
                    </div>
                </div>
                <div class="searchButtonContainer HC">
                    <img alt="search" id="search" src="../images/search-icon.png">
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
                        <img alt="dropdown-arrow" id="dropdown-arrow" src="../images/dropdown-arrow.png">
                    </div>
                    <div class="dropdownMenu shadow">
                        <div>
                            <a class="menuItem profile" href="#">Profile</a>
                            <a class="menuItem albums" href="#">Albums</a>
                            <a class="menuItem about" href="#">About</a>
                            <a class="menuItem logout" href="#">Logout</a>
                            <a class="menuItem login" href="#">Log in</a>
                            <a class="menuItem signup" href="#">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<?php
$client_id = "6i4V8LkN5O6RNc67YOY4gssx0AFh2Urw738Xur2TKPY";
$per_page = 30;
$total_images = 60; //the bigger number, the laggier, so modify at your own risk xd
$query = "flower";
$pages = ceil($total_images / $per_page);

$images = array();

for ($page = 1; $page <= $pages; $page++) {
    $url = "https://api.unsplash.com/search/photos?page=$page&per_page=$per_page&query=$query&client_id=$client_id";
    $result = json_decode(file_get_contents($url));
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
