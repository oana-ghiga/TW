<?php

function dd($data) {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

function basePath($path = null) {
    return BASE_PATH . $path;
}

function view($name, $data = []) {
    extract($data);
    return require basePath("views/{$name}.view.php");
}

function filteredSearch($phylum, $order, $family, $genus)
{
    $query = "SELECT id, plant_image
              FROM plant_names
              WHERE phylum = :phylum
              AND `order` = :order
              AND family = :family
              AND genus = :genus";

    $params = array(
        ':phylum' => $phylum,
        ':order' => $order,
        ':family' => $family,
        ':genus' => $genus
    );

    return Database::fetchAll($query, $params);
}

function getPlantsByAlbumId($albumId) {
    $query = "SELECT plant_names.id, plant_names.image_link
              FROM plant_names
              JOIN albums ON plant_names.id = albums.plant_id
              WHERE albums.id = :albumId";

    return Database::fetchAll($query, [':albumId' => $albumId]);
}

function getPlantById($plantId)
{
    $query = "SELECT *
              FROM plant_names
              WHERE id = :plantId";

    return Database::fetchOne($query, [':plantId' => $plantId]);
}