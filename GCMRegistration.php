<?php
//enter data about GCM registration id
require_once './GCMRegistrationInfo.php';

      $gcmRegistrationInfo=new GCMRegistrationInfo();
      $user_name=  trim($_GET['user_name']);
      $key=  trim($_GET['key']);
      
      $gcmRegistrationInfo->enterData($user_name, $key);
     
?>
