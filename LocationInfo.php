

<?php

/**
 * Description of LocationInfo
 *provide location information
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 */

?>

<?php
require_once  'Connection.php';
class LocationInfo {
   private $connection;
    public function  __construct() {

    }
  #use to store data about locationsp
    public function enterData($place,$latitude,$longitude){

          $this->connection=new Connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO place_info(place,latitude,longitude)
                  VALUES('$place','$latitude','$longitude');";

           mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }


//use to send data
 public function searchLocations(){

          $connection=new Connection();
          $conn =$connection->createConnection("user_information");
         
          $query="SELECT *FROM place_info ";

          $result=mysqli_query($conn,$query) or die("error");
          $i=0;
          while($row = mysqli_fetch_array($result))
          {
              $array[$i]["place"]=$row["place"];
              $array[$i]["latitude"]=$row["latitude"];
              $array[$i]["longitude"]=$row["longitude"] ;
             $i++;
              
          }

          $connection->endConnection($conn);
          return $array;
    }


}

?>
