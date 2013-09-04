<?php
#http://192.168.42.35/WebServer/Register.PHP?index="+index+"&fac_code="+fac_code+"&dept_code="+dept_code
#used by mobile application to send registration details for news service
require_once  'UserNewsRegInfo.php';


      $user_name=  trim($_GET['index']);
      $fac_code=  trim($_GET['fac_code']);
      $dept_code=  trim($_GET['dept_code']);

     $userNewsRegInfo=new UserNewsRegInfo();
     $userNewsRegInfo->enterData($user_name, $fac_code, $dept_code);
     echo "your fac is =".$fac_code."your dept is".$dept_code;
   
?>
