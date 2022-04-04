<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Movie.php';

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate movie object
    $movie = new Movies($db);

    // Get ID
    $movie->category = isset($_GET['category']) ? $_GET['category'] : die();

    // Movie query
    $result = $movie->read_category();
    // Get row count
    $num = $result->rowCount();

    // Check if any movies
    if($num > 0) {
        // movie array
        $movies_arr = array();
        //$movies_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $movie_item = array(
                'id' => $id,
                'year' => $year,
                'category' => $category,
                'winner' => $winner,
                'entity' => html_entity_decode($entity),
            );

            // Push to "data"
            array_push($movies_arr, $movie_item);
        }

        // Turn to JSON & output
        echo json_encode($movies_arr);

    }else{
        // No movies
        echo json_encode(
            array('message' => 'No Movies Found')
        );
    }