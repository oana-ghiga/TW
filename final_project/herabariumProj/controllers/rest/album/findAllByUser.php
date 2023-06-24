<?php

$album = Database::fetchOne("select * from albums where user_id = ?", [$pathVars['id']]);

header('Content-Type: application/json');
echo json_encode($album);