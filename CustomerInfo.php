<?php
require_once  'Connection.php';

class CustomerInfo {

    private $connection;
    public function  __construct() {

    }
  #use to store data about user when he signup 
    public function enterData($user_name,$first_name,$last_name,$department,$faculty,$year_of_study,$semester,$email_address){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO user_info(index_number,first_name,last_name,department,faculty,year_of_study,semester,registration_date,email_address)
                  VALUES('$user_name','$first_name','$last_name','$department','$faculty','$year_of_study','$semester',NOW(),'$email_address');";

          $result=mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }



 # this is used to display profile information
    public function searchByIndex($index_number){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
         
          $query="SELECT *FROM user_info WHERE index_number='$index_number'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              $array["index_number"]=$row["index_number"];
              $array["first_name"]=$row["first_name"];
              $array["last_name"]=$row["last_name"] ;
              $array["department"]=$row["department"];
              $array["faculty"]=$row["faculty"];
              $array["year"]=$row["year_of_study"] ;
               $array["semester"]=$row["semester"];
              $array["email"]=$row["email_address"];
              $array["registered"]=$row["registered"] ;
              
          }

          $connection->endConnection($conn);
          return $array;
    }
//register for news service not used remove later
     public function register($index_number){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
         
          $query="SELECT *FROM user_info WHERE index_number='$index_number'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              $array["index_number"]=$row["index_number"];
              
             
              
          }

          $connection->endConnection($conn);
          return $array;
    }
   
   
}
?>
