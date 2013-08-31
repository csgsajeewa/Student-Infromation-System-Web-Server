<?php
require_once  'Connection.php';

class CustomerInfo {

    private $connection;
    public function  __construct() {

    }

    public function enterData($user_name,$first_name,$last_name,$department,$faculty,$year_of_study,$semester,$email_address){

          $this->connection=new connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO user_info(index_number,first_name,last_name,department,faculty,year_of_study,semester,registration_date,email_address)
                  VALUES('$user_name','$first_name','$last_name','$department','$faculty','$year_of_study','$semester',NOW(),'$email_address');";

          $result=mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }




    public function searchByIndex($index_number){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
         
          $query="SELECT FROM user_info WHERE index_number='$index_number'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              $array=array("index_number"=>$row["index_number"],"first_name"=>$row["first_name"] , "last_name"=>$row["last_name"] );
             
              
          }

          $connection->endConnection($conn);
          return $array;
    }
// used bu customers to check details
   
}
?>
