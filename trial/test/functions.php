<?php

function dd($data) {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

function basePath($path = null) {
    return __DIR__ . $path;
}

function view($name, $data = []) {
    extract($data);
    return require "views/{$name}.view.php";
}