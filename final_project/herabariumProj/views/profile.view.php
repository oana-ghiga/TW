<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta content="initial-scale=1, width=device-width" name="viewport"/>
    <link href="../test/css/stylesheet.css" rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Sarala:wght@400;700&display=swap"
        rel="stylesheet"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Shanti:wght@400&display=swap"
        rel="stylesheet"
    />
</head>


<style>
    .parent {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(4, 1fr);
        grid-column-gap: 2px;
        grid-row-gap: 2px;
        height: 100%;
    }

    .div-1 {
        height: 20%;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .div-1 h1 {
        font-size: 3rem;

    }

    .div-2 {
        height: 60%;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 7px rgba(0, 0, 0, 0.2);

    }

    .div-2 img {
        transform: scale(0.7);
    }

    .div-3 {
        height: 30%;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .button {
        border-radius: 50px;
        text-align: center;
        color: hsl(240, 3%, 35%);;
        font-size: 1.5rem;
        font-weight: 550;
        border-color: transparent;
        background-color: hsl(0, 0%, 85%);

        justify-content: center;
        align-items: center;
        padding: 1rem;
        margin: 1rem;
    }

    .user_info {
        display: flex;
        flex-direction: column;
        color: #57575c;
    }

    .user_info p2 {
        font-size: 1.7rem;
        color: #000000;
    }


    .parent {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

    }

    .center_card {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 40px;
        background-color: #e1e0e0;
        box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.3);
        width: 50rem;
        height: 43rem;
    }


    @media only screen and (max-width: 600px) {
        .center_card {
            width: 90%;
            height: auto;
            max-height: 100vh;
        }

        .div-2 {
            flex-direction: column;
            height: auto;
        }

        .user_info {
            margin-bottom: 3rem;
        }

        .div-2 img {
            transform: scale(0.7);
            margin-bottom: 1rem;
        }

        .div-3 {
            height: auto;
            margin: 1rem;
        }

        .button {
            margin: 0.5rem;
        }

    }
</style>
<?php
require_once basePath('/templates/head.php');
?>

<body>
<?php
require_once basePath('/templates/header.php');
?>
<?php
require_once basePath('/templates/filter.php');
?>
<div class="main">
    <div class="center_card">

        <div class="parent">

            <div class="div-1">
                <h1><b>My profile</b></h1>
            </div>

            <div class="div-2">
                <img src="https://i.imgur.com/cKgNdPC.png">
                <div class="user_info">


                    <?php
                    // Display user information if available
                    if ($user) {
                        echo "<p2><b>Name:</b></p2> <p2>" . $user['username'] . "</p2>";
                        echo "<br> <p2><b>Email:</b></p2> <p2>" . $user['email'] . " </p2>";
                        // Add other user details as needed
                    } else {
                        echo "<p>User information not found.</p>";
                    }

                    ?>
                </div>
            </div>

            <div class="div-3">

                <button class="button" onclick = "logout()"> Log out</button>
                <button class="button" onclick="changePassword()"> Change Password</button>
                <button class="button" onclick="generateRSS()" > RSS</button>

            </div>

        </div>
    </div>
</div>
</body>

<script>
    function logout(){
        window.location.href = "/logout";
    }
    function changePassword(){
        window.location.href = "/password";
    }
    function generateRSS() {
        window.location.href = "/rss";
    }
</script>
<script type="text/javascript" src="/assets/javascript/script.js"></script>
<script type="text/javascript" src="/assets/javascript/login.js"></script>
</html>
