<?php

$query = "select * from plant_names";

$plants = Database::fetchAll($query);

header('Content-Type: application/json');
echo json_encode($plants);