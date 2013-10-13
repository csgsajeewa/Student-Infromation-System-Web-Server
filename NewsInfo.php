<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * #relate to news items table add news items to the table by admin
 */
?>
<?php

require_once  'Connection.php';

class NewsInfo {

    private $connection;
    public function  __construct() {

    }
#admin uses this function to add news items to function - call by NewsAddForm.html
    public function enterData($fac_code,$dept_code,$heading,$details){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO news_items(fac_code,dept_code,heading,details,date)
                  VALUES('$fac_code','$dept_code','$heading','$details',NOW());";

          $result=mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }


#ProvideNews.php
#Get fac_code and dept_code and then find all the news items related to that user.    

    public function searchNews($fac_code,$dept_code){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
         
          $query="SELECT *FROM news_items WHERE fac_code='$fac_code' and dept_code='$dept_code' ORDER BY date DESC;";

          $result=mysqli_query($conn,$query) or die("error");
          $i=0;
          while($row = mysqli_fetch_array($result))
          {
              $array[$i]["heading"]=$row["heading"];
              $array[$i]["details"]=$row["details"];
              $array[$i]["date"]=$row["date"] ;
             $i++;
              
          }

          $connection->endConnection($conn);
          return $array;
    }

   
}
?>
