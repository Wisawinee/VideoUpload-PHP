<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'Maxim123');
    define('DB_NAME', 'db_video');
 
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM video");
            return $result;
        }

        public function fetchonerecord($video_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM video WHERE video_id = '$video_id'");
            return $result;
        }

        public function delete($video_name) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM video WHERE video_name = '$video_name'");
            return $deleterecord;
        }

    }
    
?>