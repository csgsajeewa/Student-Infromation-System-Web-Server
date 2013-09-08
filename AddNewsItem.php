<?php

  require_once  './NewsInfo.php';
  require_once './UserNewsRegInfo.php';
  require_once './NotificationManager.php';
  require_once './GCMRegistrationInfo.php';

      $fac_code=  trim($_GET['faculty']);
      $dept_code=  trim($_GET['department']);
      $heading=  trim($_GET['heading']);
      $details= trim($_GET['details']);

     $newsInfo=new NewsInfo();//1
     $newsInfo->enterData($fac_code,$dept_code,$heading,$details);
     $userNewsRegInfo=new UserNewsRegInfo();//2
     $gcmInfo=new GCMRegistrationInfo();//3
     $array=$userNewsRegInfo->searchByFDCode($fac_code, $dept_code);
    echo count($array);
     $notificationManager=new NotificationManager();
     for ($index = 0; $index < count($array); $index++) {
          $reg_id=$gcmInfo->searchByIndex($array[$index]);
         echo $reg_id;
          $notificationManager->send_message($reg_id, $heading, $details);
     }
     $main_page_url="NewsAddForm.html";
   #   header('Location:'. $main_page_url);
     
?>
