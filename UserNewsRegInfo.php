<?php
#relate to "user_news_reg_info table. It provides details about - 
#index number
#fac code
#dept code

require_once  'Connection.php';

class UserNewsRegInfo {
   private $connection;
    public function  __construct() {

    }
   #use this function to register users to new service - this is used by mobile app
    public function enterData($user_name,$faculty,$department){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");//connect to user_information database

          $query1="INSERT INTO user_news_reg_info(index_number,fac_code,dept_code)
                  VALUES('$user_name','$faculty','$department');";

          $result1=mysqli_query($conn,$query1);
          
           $query2="UPDATE user_info set registered='Yes' WHERE index_number='$user_name'";
           $result2=mysqli_query($conn,$query2);

          $this->connection->endConnection($conn);
    }
    #deregister user
    public function unregister($user_name){
        
        $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query1="DELETE FROM user_news_reg_info WHERE index_number='$user_name';";

          $result1=mysqli_query($conn,$query1);
          
           $query2="UPDATE user_info set registered='No' WHERE index_number='$user_name'";
           $result2=mysqli_query($conn,$query2);

          $this->connection->endConnection($conn);
        
    }
#used by ProvideNews.php
#Get fac code and dept code for the corresponding index number
 public function searchByIndex($index){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
          
          $query="SELECT fac_code,dept_code FROM user_news_reg_info WHERE index_number='$index'";
       
          $result=mysqli_query($conn,$query) or die("error");

          $row = mysqli_fetch_array($result);
             
              $array["fac_code"]=$row["fac_code"];
              $array["dept_code"]=$row["dept_code"] ;
          
//            echo $array["fac_code"];
//            echo $array["dept_code"];
            
          $connection->endConnection($conn);
          return $array;

    }

    #used by notification manager.php
#Get index number for corresponding fac code and dept code 
 public function searchByFDCode($fac_code,$dept_code){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
          
          $query="SELECT index_number FROM user_news_reg_info WHERE fac_code='$fac_code' and dept_code='$dept_code'";
       
          $result=mysqli_query($conn,$query) or die("error");
           $i=0;
          while($row = mysqli_fetch_array($result))
          {
            $array[$i]=$row["index_number"];
            $i++;
          }
            
          $connection->endConnection($conn);
          return $array;

    }

   

}

?>
