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
<div class="loginContainer shadow">
    <h2>Login</h2>
    <div class="loginFormContents">
        <form id="loginForm" action="authenticate" method="POST">
            <div class="inputField">
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            </div>
            <div class="inputField">
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            </div>
            <div class="loginButton">
                <input type="submit" id="login" value="Sign In">
            </div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="assets/javascript/script.js"></script>
<script type="text/javascript" src="assets/javascript/login.js"></script>

</html>