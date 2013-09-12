<?php
#handles the security information about the user (user name,password)
#user md5 to encrypt the password
require_once  'Connection.php';

class CustomerSecInfo {

    private $connection;
    public function  __construct() {
      $database_name="user_information";
    }
    //enter data to the table
    public function enterData($user_name,$password){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");
          $password=  md5($password);
          $query="INSERT INTO user_sec_info(index_number,password)
                  VALUES('$user_name','$password');";

          $result=mysqli_query($conn,$query);
          $this->connection->endConnection($conn);
    }
   //get data to validate the user
    public function getData($user_name,$password){

          $validated=false;
          $connection=new Connection();
          $conn =$connection->createConnection("user_information");

          $query="SELECT *FROM user_sec_info WHERE index_number='$user_name'";
          $result=mysqli_query($conn,$query) or die("error");

          if(mysqli_num_rows ($result)==0)
          {
              #echo 'ERROR--user name is not exist!!!!!!!!!!!!!!!!!';
   
          }

          else
          {
              $row = mysqli_fetch_array($result);
              if($row["password"]==md5($password))
              {
                 # echo 'ERROR--password is wrong!!!!!!!!!!!!!!!!!';
                  $validated=true;
              }
          }


          $connection->endConnection($conn);
          return $validated;
    }



}

?>
