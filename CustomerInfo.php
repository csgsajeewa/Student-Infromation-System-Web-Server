<?php
require_once  'Connection.php';

class CustomerInfo {

    private $connection;
    public function  __construct() {

    }

    public function enterData($first_name,$last_name,$department,$faculty,$year_of_study,$semester,$email_address){

          $this->connection=new connection();
          $conn =$this->connection->createConnection("user_information");

          $query="INSERT INTO user_info(first_name,last_name,department,faculty,year_of_study,semester,registration_date,email_address)
                  VALUES('$first_name','$last_name','$department','$faculty','$year_of_study','$semester',NOW(),'$email_address');";

          $result=mysqli_query($conn,$query);

          $this->connection->endConnection($conn);
    }


   //search by sales manager
    public function getData(){

          $connection=new connection();
          $conn =$connection->createConnection("user_information");

          $query="SELECT *FROM customer_information";
          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              echo 'customer name is '.$row["first_name"].' '.$row["last_name"]."<br/>";
              echo 'customer email is '.$row["email"]."<br/>";
              echo 'customer registration date is'.$row["date"]."<br/>";
          }

          $connection->endConnection($conn);

    }

   public function searchFileName($name){

          $connection=new Connection();
          $conn =$connection->createConnection("database_1");
          $n=$name;
          $query="SELECT *FROM customer_information WHERE first_name='$name'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {

             $file_name=$row["image_name"];
          }

          $connection->endConnection($conn);
          return $file_name;

    }


//used by sales manager
    public function searchByFirstName($name){

          $connection=new Connection();
          $conn =$connection->createConnection("database_1");
          $n=$name;
          $query="SELECT *FROM customer_information WHERE first_name='$name'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              echo 'customer name is '.$row["first_name"].' '.$row["last_name"]."<br/>";
              echo 'customer email is '.$row["email"]."<br/>";
              echo 'customer registration date is'.$row["date"]."<br/>";
          }

          $connection->endConnection($conn);

    }
// used bu customers to check details
    public function searchByID($id){

          $connection=new Connection();
          $conn =$connection->createConnection("database_1");

          $query="SELECT *FROM customer_information WHERE id='$id'";

          $result=mysqli_query($conn,$query) or die("error");

          while($row = mysqli_fetch_array($result))
          {
              $target="images/".$row["first_name"].".jpg";
              ?>
              <h1>Your Information......</h1>
              <link  type="text/css" rel="stylesheet" href="1.css"/>

              <table>

                  <tr>
                      <td>
                          <img src= "<?php echo $target ?> "  alt="photo">
                      </td>

                  </tr>

                  <tr>
                      <td>
                          Your name :
                      </td>

                      <td>
                          <?php  echo $row["first_name"]; echo $row["last_name"] ?>
                      </td>
                  </tr>

                  <tr>
                      <td>
                          Your e mail :
                      </td>
                      <td>
                          <?php echo $row["email"] ?>
                      </td>
                  </tr>

                  <tr>
                      <td>
                          your registration date :
                      </td>
                      <td>
                           <?php echo $row["date"] ?>
                      </td>
                  </tr>

              </table>


               <a href="http://localhost/p_3/customerForm.php"> Back to customer Page </a>
               <br/>
               <a href="http://localhost/p_3/mainWIndow.html"> Back to Main Page </a>
               <?php
           }


          $connection->endConnection($conn);

    }
}
?>
