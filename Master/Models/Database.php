<?php 

class Database
{
    public $instance;

    // Constructor to establish database connection
    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "your_anime_list";

        // Create connection
        $this->instance = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->instance->connect_error) {
            die("Connection failed: " . $this->instance->connect_error);
        }
    }

    // Destructor to close database connection
    public function __destruct() {
    }
}


?>