<?php

$query = "select * from albums";

$albums = Database::fetchAll($query);

header('Content-Type: application/json');
echo json_encode($albums);