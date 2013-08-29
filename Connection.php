<?php

 class Connection {

    private $server_name;
    private $user_name;
    private $database_name;
    function  __construct() {
        $this->server_name="localhost";
        $this->user_name="root";
    }

    public function createConnection($database_name){

        $this->database_name=$database_name;
          $conn = mysqli_connect($this->server_name,  $this->user_name, "",  $this->database_name);
           if (empty($conn)) {                                       //password
               die("mysqli_connect failed: " . mysqli_connect_error());

           }

           return $conn;
    }

    public function endConnection($conn){

        mysqli_close($conn);
    }
}
?>
