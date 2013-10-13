<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * #used for sign in purposes
 */
?>

<?php
 
  require_once  'CustomerSecInfo.php';


      $user_name=  trim($_GET['user_name']);
      $password=  trim($_GET['password']);

      $validator=new CustomerSecInfo();
      $validate=$validator->getData($user_name,$password);

      if($validate)
      {
         //msg send to mobile app upon suceessfull login- this link will be used by the XML parser to retrieve user details
         echo 'http://192.168.42.35/WebServer/AccountDetails.php?index='.$user_name;

      }
     //pwd wrong
      else if(!$validate)
      {
         echo '210';# server message for invalid signin
      }
   

  ?>