<?php

    include_once '../config/Database.php';

    // Instantiate DB & connect
    $database = new Database();
    $connect = $database->connect();
                
    $val = $connect->quote($_GET['fyear']);
    $val2 = $connect->quote($_GET['lyear']);
    
    $query = "SELECT DISTINCT category FROM info WHERE year BETWEEN $val AND $val2 ORDER BY category ASC";
    $result = $connect->query($query);
    
    echo '<option value="Select Category" disabled selected>Select Category</option>';
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
    }
    