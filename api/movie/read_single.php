<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Movie.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Movie object
    $movie = new Movies($db);

    // Get ID
    $movie->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get movie
    $movie->read_single();

    // Create array
    $movie_arr = array(
        'id' => $movie->id,
        'year' => $movie->year,
        'category' => $movie->category,
        'winner' => $movie->winner,
        'entity' => $movie->entity,
    );

    // Make JSON
    print_r(json_encode($movie_arr));