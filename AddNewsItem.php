<?php

  require_once  './NewsInfo.php';


      $fac_code=  trim($_GET['faculty']);
      $dept_code=  trim($_GET['department']);
      $heading=  trim($_GET['heading']);
      $details= trim($_GET['details']);

     $newsInfo=new NewsInfo();
     $newsInfo->enterData($fac_code,$dept_code,$heading,$details);
     
?>
