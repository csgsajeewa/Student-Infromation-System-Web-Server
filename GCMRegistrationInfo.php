<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * #use to store data about GCM, index number and registration id given by GCM
 */
?>


<?php
#use to store data about GCM, index number and registration id given by GCM
require_once  'Connection.php';

class GCMRegistrationInfo {

    private $connection;
    public function  __construct() {

    }
  #use to store GCM data about user when he has registered for the news service
    public function enterData($user_name,$key){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO 'gcm_info'('index_number', 'key') VALUES ('$user_name','$key')";

          $result=mysqli_query($conn,$query);
         
          $this->connection->endConnection($conn);
    }



 # this is used to get the key for the corresponding index number
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
