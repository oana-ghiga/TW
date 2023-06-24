<!DOCTYPE html>
<html>
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
<div class="registerContainer shadow">
    <h2>Register</h2>
    <div class="registerFormContents">
        <form id="registrationForm" action="/storeUser" method="POST">
            <div class="inputField">
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            </div>
            <div class="inputField">
                <input type="email" id="email" name="email" placeholder="Email" required><br><br>
            </div>
            <div class="inputField">
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            </div>
            <div class="registerButton">
                <input type="submit" id="register" value="Register">
            </div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="assets/javascript/script.js"></script>
<!--<script type="text/javascript" src="assets/javascript/register.js"></script>-->
</html>
