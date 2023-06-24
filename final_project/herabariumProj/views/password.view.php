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
    <h2>Change Password</h2>
    <?php if (isset($error)): ?>
        <div class="error">
            <p><?= $error ?></p>
        </div>
    <?php endif; ?>
    <div class="registerFormContents">
        <form id="registrationForm" action="/changePass" method="POST">
            <div class="inputField">
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            </div>
            <div class="inputField">
                <input type="password" id="current_password" name="current_password" placeholder="Old Password" required><br><br>
            </div>
            <div class="inputField">
                <input type="password" id="new_password" name="new_password" placeholder="New Password" required><br><br>
            </div>
            <div>
                <div class="inputField">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required><br><br>
                </div>
            </div>
            <div class="registerButton">
                <input type="submit" id="register" value="Submit">
            </div>
            <input type="hidden" name="_method" value="PUT">
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="assets/javascript/script.js"></script>
<!--<script type="text/javascript" src="assets/javascript/password.js"></script>-->
</html>
