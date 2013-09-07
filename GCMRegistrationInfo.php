<?php

require_once  'Connection.php';

class GCMRegistrationInfo {

    private $connection;
    public function  __construct() {

    }
  #use to store data about user when he signup 
    public function enterData($user_name,$key){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO `gcm_info`(`index_number`, `key`) VALUES ('$user_name','$key')";

          $result=mysqli_query($conn,$query);
          echo $key;
          $this->connection->endConnection($conn);
    }



 # this is used to display profile information
    public function searchByIndex($index_number){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
         
          $query="SELECT *FROM gcm_info WHERE index_number='$index_number'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              $key=$row["key"];
              
          }

          $connection->endConnection($conn);
          return $key;
    }

   
   
}
?>
