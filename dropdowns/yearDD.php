<?php  

    include_once '../config/Database.php';

    // Instantiate DB & connect
    $database = new Database();
    $connect = $database->connect();

    $query = "SELECT DISTINCT year FROM info";
    $result = $connect->query($query);
    
    echo '<option value="Select Year" disabled selected>Select Year</option>';
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['year'].'">'.$row['year'].'</option>';
    }
?>