<?php
    class Database {
        // DB Params
        private $username = 'gitlordz';
        private $password = 'ASDfghjkl123';
        private $conn;

        // DB connect
        public function connect() {
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=hostname;dbname=dbname;charset=utf8', $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }