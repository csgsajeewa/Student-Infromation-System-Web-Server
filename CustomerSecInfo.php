<?php
require_once  'Connection.php';

class CustomerSecInfo {

    private $connection;
    public function  __construct() {
      $database_name="user_information";
    }

    public function enterData($user_name,$password){

          $this->connection=new connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO user_sec_info(user_name,password)
                  VALUES('$user_name','$password');";

          $result=mysqli_query($conn,$query);
         // print_r($result);

            // mysqli_close($conn);
          $this->connection->endConnection($conn);
    }

    public function getData($user_name,$password){

          $validated=false;
          $connection=new Connection();
          $conn =$connection->createConnection("database_1");

          $query="SELECT *FROM customer_security_info WHERE user_name='$user_name'";
          $result=mysqli_query($conn,$query) or die("error");

          if(mysqli_num_rows ($result)==0)
          {
              echo 'ERROR--user name is not exist!!!!!!!!!!!!!!!!!';
          }

          else
          {
              $row = mysqli_fetch_array($result);
              if($row["password"]==$password)
              {
                  echo 'ERROR--password is wrong!!!!!!!!!!!!!!!!!';
                  $validated=true;
              }
          }


          $connection->endConnection($conn);
          return $validated;
    }

    public function get_customer_id($user_name,$password){

         $connection=new Connection();
         $conn =$connection->createConnection("user_information");

         $query="SELECT *FROM user_sec_info WHERE user_name='$user_name'" AND "password='$password'";
         $result=mysqli_query($conn,$query) or die("error");

         $row = mysqli_fetch_array($result);
         $id=$row["id"];
         return $id;

    }


}

?>
