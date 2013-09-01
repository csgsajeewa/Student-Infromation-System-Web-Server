

<?php
 #used for sign in purposes
  require_once  'CustomerSecInfo.php';


      $user_name=  trim($_GET['user_name']);
      $password=  trim($_GET['password']);

      $validator=new CustomerSecInfo();
      $validate=$validator->getData($user_name,$password);

      if($validate)
      {
         //msg send to mobile app upon suceessfull login
         echo 'http://192.168.42.35/WebServer/AccountDetails.php?index='.$user_name;

      }

      else if(!$validate)
      {
         echo 'Login unsucessful';
      }
   

  ?>