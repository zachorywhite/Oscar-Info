<?php

    include_once '../config/Database.php';

    // Instantiate DB & connect
    $database = new Database();
    $connect = $database->connect();
                
    $val = $connect->quote($_GET['year']);
    
    $query = "SELECT DISTINCT category FROM info WHERE year=$val";
    $result = $connect->query($query);
    
    echo '<option value="Select Category" disabled selected>Select Category</option>';
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
    }
    