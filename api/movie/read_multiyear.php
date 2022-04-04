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

    // Get IDs
    $movie->year = isset($_GET['fyear']) ? $_GET['fyear'] : die();
    $movie->year2 = isset($_GET['lyear']) ? $_GET['lyear'] : die();
            
    // Movie query
    $result = $movie->read_multiyear();
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

            //echo json_encode($movie_item);
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