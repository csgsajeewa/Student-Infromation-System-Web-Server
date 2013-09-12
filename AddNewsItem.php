<?php
#add news to the system, check registered users for each news item and then send notifications
  require_once  './NewsInfo.php';
  require_once './UserNewsRegInfo.php';
  require_once './NotificationManager.php';
  require_once './GCMRegistrationInfo.php';

      $fac_code=  trim($_GET['faculty']);// get user inputs
      $dept_code=  trim($_GET['department']);
      $heading=  trim($_GET['heading']);
      $details= trim($_GET['details']);

     $newsInfo=new NewsInfo();//1
     $newsInfo->enterData($fac_code,$dept_code,$heading,$details);//add news items to news table
     $userNewsRegInfo=new UserNewsRegInfo();//2
     $gcmInfo=new GCMRegistrationInfo();//3
     $array=$userNewsRegInfo->searchByFDCode($fac_code, $dept_code);//get users who have registered for that news
 
     $notificationManager=new NotificationManager();//handles GCM messaging service
     for ($index = 0; $index < count($array); $index++) {
          $reg_id=$gcmInfo->searchByIndex($array[$index]);//get registered key for the user (given by GCM)
      
          $notificationManager->send_message($reg_id, $heading, $details);//send message to user
     }
     $main_page_url="NewsAddForm.html";
      header('Location:'. $main_page_url);
     
?>
