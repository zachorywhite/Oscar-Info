<?php

    include_once 'config/Database.php';

    // Instantiate DB & connect
    $database = new Database();
    $connect = $database->connect();

    $val = $connect->quote($_GET['year']);
    $val2 = $connect->quote($_GET['category']);

    $sql = "SELECT * FROM info WHERE year=$val AND category=$val2";
    $result = $connect->query($sql);
       
    echo '
        <table class="table table-bordered">
            <tr>
            <th width="5%">Year</th>
            <th width="10%">Category</th>
            <th width="5%">Winner</th>
            <th width="55%">Entity</th>
            </tr>
        ';
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo '
            <tr>
                <td>'.$row["year"].'</td>
                <td>'.$row["category"].'</td>
                <td>'.$row["winner"].'</td>
                <td>'.$row["entity"].'</td>
            </tr>
            ';
    }
    echo '</table>';

?>