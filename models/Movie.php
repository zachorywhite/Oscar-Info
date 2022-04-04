<?php
    class Movies {
        //DB stuff
        private $conn;
        private $table = 'info';

        // Movie Properties
        public $id;
        public $year;
        public $category;
        public $winner;
        public $entity;
        

        // Constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        // Get Movies
        public function read(){
            // Create query
            $query = "SELECT * FROM info";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        // Get Single Movie
        public function read_single(){
            // Create query
            $query = "SELECT * FROM info WHERE id=?";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->id);

            // Execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties
            $this->id = $row['id'];
            $this->year = $row['year'];
            $this->category = $row['category'];
            $this->winner = $row['winner'];
            $this->entity = $row['entity'];
        }

        // Get One Category
        public function read_category(){
            // Create query
            $query = "SELECT * FROM info WHERE category=?";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->category);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
        
        // Get One Year
        public function read_year(){
            // Create query
            $query = "SELECT * FROM info WHERE `year`=?";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->year);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
        
        // Get one category from year
        public function read_yearcat(){
            // Create query
            $query = "SELECT * FROM info WHERE year=? AND category=?";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->year);
            $stmt->bindParam(2, $this->category);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
        
        // Get multiple year
        public function read_multiyear(){
            // Create query
            $query = "SELECT * FROM info WHERE `year` BETWEEN ? AND ?";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->year);
            $stmt->bindParam(2, $this->year2);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
        
        // Get multiple + shared category
        public function read_multiyearCat(){
            // Create query
            $query = "SELECT * FROM info WHERE (`year` BETWEEN ? AND ?) AND category=?";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->year);
            $stmt->bindParam(2, $this->year2);
            $stmt->bindParam(3, $this->category);

            // Execute query
            $stmt->execute();

            return $stmt;
        }
    }