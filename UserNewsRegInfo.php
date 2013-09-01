<?php

require_once  'Connection.php';

class UserNewsRegInfo {
   private $connection;
    public function  __construct() {

    }

    public function enterData($user_name,$faculty,$department){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO user_news_reg_info(index_number,fac_code,dept_code)
                  VALUES('$user_name','$faculty','$department');";

          $result=mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }




   

}

?>
