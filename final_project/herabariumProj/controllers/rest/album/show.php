<?php

$album = Database::fetchOne("select * from albums where id = ?", [$pathVars['id']]);

header('Content-Type: application/json');
echo json_encode($album);