<?php
require_once  'Connection.php';

class NewsInfo {

    private $connection;
    public function  __construct() {

    }

    public function enterData($fac_code,$dept_code,$heading,$details){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO news_items(fac_code,dept_code,heading,details,date)
                  VALUES('$fac_code','$dept_code','$heading','$details',NOW());";

          $result=mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }


###################################not used#################################################

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
             
              
          }

          $connection->endConnection($conn);
          return $array;
    }
//register for news service
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
