<?php

$config = require_once basePath('config.php');

$sql = "
    select *
    from {$config['tables']['user']}
    where username = ?";

$user = Database::fetchOne($sql, [$_POST["username"]]);

if(!$user) {
    header("Location: /register");
    exit();
}
if(password_verify($_POST["password"],$user["password"])){

    session_regenerate_id();

    $_SESSION["id"] = $user["user_id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];

    header("Location: /main");
    exit();
}
else
{
    header("Location: /register");
    exit();
}