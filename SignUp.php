
        <?php
          // used for new users to register in the web site

          require_once 'CustomerInfo.php';
          require_once 'CustomerSecInfo.php';
        
           $access1=new CustomerInfo();
           $access2=new CustomerSecInfo();
           //get user basic information////////////////////////
           $first_name=trim($_GET["first_name"]);
           $last_name=trim($_GET["last_name"]);
           $email_address=trim($_GET["email_address"]);
           $department=trim($_GET["department"]);
           $faculty=trim($_GET["faculty"]);
           $year_of_study=trim($_GET["year_of_study"]);
           $semester=trim($_GET["semester"]);
           /////////////////////////////////////////////////////////
           
           ///////get user security information/////////////////////////

           $password=trim($_GET["password"]);
           $user_name=trim($_GET["user_name"]);
            //////////////////////////////////////////////////////////////

            #form validation is entirely done by mobile client so no need of this 
           # only need to check whether user has already registered in the site
           $array= $access1->searchByIndex($user_name);
           if($array!=0 && count($array)==9)
           {
                echo "200"; //200 user exist
               

           }
           else
           {
             echo 'Registration is Successful';
             $access1->enterData($user_name,$first_name,$last_name,$department,$faculty,$year_of_study,$semester,$email_address);
             $access2->enterData($user_name,$password);
           }

?>
