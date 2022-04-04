<?php

    include_once '../config/Database.php';

    // Instantiate DB & connect
    $database = new Database();
    $connect = $database->connect();
                
    $val = $connect->quote($_GET['year']);
    
    $query = "SELECT DISTINCT year FROM info WHERE year > $val ORDER BY category ASC";
    $result = $connect->query($query);
    
    echo '<option value="Select 2nd Year" disabled selected>Select 2nd Year</option>';
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['year'].'">'.$row['year'].'</option>';
    }
    