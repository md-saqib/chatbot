<?php
    class Services{

        // specify your own database credentials
        // production
        // private $host = "localhost";
        // private $db_name = "u366973878_vtubot";
        // private $username = "u366973878_vtuadmin";
        // private $password = "M&7z9Ts$";

        //localhost
        private $host = "localhost";
        private $db_name = "chatbot";
        private $username = "root";
        private $password = "";

        public $conn;

        // get the database connection
        public function getConnection(){

            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn;
        }

        public function getCollegeDetails($college) {
            $conn = $this->getConnection();
            try {
                $details = $conn->prepare("SELECT * FROM college_details WHERE collegeName LIKE ?");
                $details->execute(["%$college%"]);
                $result = $details->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e) {
               echo $e->getMessage();
            }
        }

    }






?>