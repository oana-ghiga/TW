<?php

$plant = Database::fetchOne("select * from plant_names where id = ?", [$pathVars['id']]);

header('Content-Type: application/json');
echo json_encode($plant);