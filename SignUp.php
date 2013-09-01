
        <?php
// used for new users///////////////////////////////////////////

          require_once 'CustomerInfo.php';
          require_once 'CustomerSecInfo.php';
           $output_form=false;


          $first_name="";
          $last_name="";
          $department="";
          $faculty="";
          $year_of_study="";
          $semester="";
          $email_address="";


           $first_name=trim($_GET["first_name"]);
           $last_name=trim($_GET["last_name"]);
           $email_address=trim($_GET["email_address"]);
           $department=trim($_GET["department"]);
           $faculty=trim($_GET["faculty"]);
           $year_of_study=trim($_GET["year_of_study"]);
           $semester=trim($_GET["semester"]);


           $password=trim($_GET["password"]);
           $user_name=trim($_GET["user_name"]);




           if(empty ($first_name) || empty ($last_name) ||empty ($email_address)|| empty ($department)||empty ($faculty) ||empty ($year_of_study) ||empty ($semester)||empty($password) || empty($user_name))
           {
                echo 'SORRY -----You need to fill all data fields';
                $output_form=true;

           }
           else
           {
             echo 'http://192.168.42.35/WebServer/AccountDetails.php?index='.$user_name;
             
           


             $access1=new CustomerInfo();
             $access1->enterData($user_name,$first_name,$last_name,$department,$faculty,$year_of_study,$semester,$email_address);
             $access2=new CustomerSecInfo();
             $access2->enterData($user_name,$password);


          }






        ?>
