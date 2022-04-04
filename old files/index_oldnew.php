<html>  
    <head>  
        <title>Oscar Info</title> 
        <link rel="stylesheet" href="style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>           
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    </head>
    
    
    <?php
        $connect = mysqli_connect("shareddb-u.hosting.stackcp.net", "gitlordz", "ASDfghjkl123", "oscarinfo-313333d7d0"); // Database info to connect to in MySQL
        //remove <script></script> and add php start and close tag
        //comment these two lines when code started working fine
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        
        $filename = 'values.txt';
        $eachlines = file($filename, FILE_IGNORE_NEW_LINES);

    ?>
    
    <body>
        <div class="head-div">
            <a id="home-link" style="font-size:30px" href="http://oscarinfo-com.stackstaging.com">Oscar Info</a>
        </div>

        <div id="drop-menu">
            <select id="value" class="chosen" style="width: 130px;">
                
                <option disabled selected value="base">Select Year</option>
                <?php
                //foreach($eachlines as $lines){ 
                //    echo "<option value='".$lines."'>$lines</option>";
                //}
                
                    $sql = "SELECT DISTINCT year FROM info";
                    $result = mysqli_query($connect,$sql);
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                    }
                
                ?>
                
            </select>

            <select name="category-dropdown" id="category-dropdown" class="chosen" style="width: 130px;">
                <option value="Category" disabled selected>Category</option>
                <option value="Best-Picture">Best Picture</option>
                <option value="Visual-Effects">Visual Effects</option>
                <option value="Best-Actor">Best Actor</option>
                <option value="Best-Actress">Best Actress</option>
                <option value="Best-Director">Best Director</option>
            </select>

            <button id="go-button">Go</button>

        </div>
        <body>
            
            <div class="display">
            <?php
                $query = '';
                $table_data = '';
                $filename = "src/oscardata.json"; // .json file name
                $data = file_get_contents($filename); // Gets filename and imports in php
                $array = json_decode($data, true);
                
               $sql = "SELECT * FROM info";
               // $result = mysqli_query($connect,$sql);
                
                // foreach($array as $row) // Extracts json and inserts as values in each row in MySQL
                while($row = mysqli_fetch_array($result))
                {
                    // $query .= "SELECT FROM info(year, category, winner, entity) VALUES ('".$row["year"]."', '".$row["category"]."', '".$row["winner"]."', '".$row["entity"]."'); ";  // Make Multiple Insert Query 
                    echo '
                                    <tr>
                                        <td>'.$row["year"].'</td>
                                        <td>'.$row["category"].'</td>
                                        <td>'.$row["winner"].'</td>
                                        <td>'.$row["entity"].'</td>
                                    </tr>
                                    ';
                }
                 /*if(mysqli_multi_query($connect, $query)) // if available data and can connect to mysql database, export data into table
                 {
                    echo '
                        <div style="overflow-y:auto; height: 55%;">
                         <table class="table table-bordered">
                            <tr>
                             <th width="5%">Year</th>
                             <th width="10%">Category</th>
                             <th width="5%">Winner</th>
                             <th width="55%">Entity</th>
                            </tr>
                         ';
                    echo $table_data;  
                    echo '</table></div>';
                }*/
            ?>
            </div><br/>
        </body>
        
        <script type="text/javascript">
            $(".chosen").chosen();
        </script>
        
 </html>  