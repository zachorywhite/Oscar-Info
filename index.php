<html>  
    <head>  
        <title>Oscar Info</title> 
        <link rel="stylesheet" href="style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     
        <script src="jscripts/scripts.js"></script>
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>           
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    </head>
    
    <?php
        include 'config/Database.php';
        $database = new Database();
        $connect = $database->connect();
        
        error_reporting(E_ALL);
        ini_set('display_errors',1);
    ?>
    
    <body>
        <div class="head-div">
            <a id="home-link" style="font-size:30px" href='http://oscarinfo-com.stackstaging.com/'>Oscar Info</a><br>
            <a id="head-link" href='documentation.html' style="font-size:12px">API Documentation</a> | <a id="head-link" href='https://github.com/ToasterLady/Xx-Git-Lordz-xX' style="font-size:12px">Source Files</a><br>
        </div><br>
        

        <div id="drop-menu">
            
           <select name="year-dropdown" id="value" style="width: 130px;">                       
            </select>

            <select name="year-dropdown2" id="value2" style="width: 130px;margin-left: 5px">    
                <option value="Select 2nd Year" disabled selected>Select 2nd Year</option>                   
            </select>

            <select name="category-dropdown" id="category-dropdown" style="width: 300px;">
                <option value="Select Category" disabled selected>Select Category</option>
            </select>
            
            <input id="submit" type="submit" value="Search" style="margin-left: 5px">
                
        </div>
        <body>
            
            <div class="display">
                <div class="tabledisplay" id="tabledisplay" style="overflow-y:auto; height: 55%;">
                    <table id="table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">Year</th>
                                <th width="10%">Category</th>
                                <th width="5%">Winner</th>
                                <th width="55%">Entity</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div><br/>
            
        </body>
 </html>  