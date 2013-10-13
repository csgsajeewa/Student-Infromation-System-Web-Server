<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * ##used by mobile application to send registration details for news service
 */
?>
<?php
#http://192.168.42.35/WebServer/Register.PHP?index="+index+"&fac_code="+fac_code+"&dept_code="+dept_code

require_once  'UserNewsRegInfo.php';



      $user_name=  trim($_GET['index']);
      $fac_code=  trim($_GET['fac_code']);
      $dept_code=  trim($_GET['dept_code']);

     $userNewsRegInfo=new UserNewsRegInfo();
     $userNewsRegInfo->enterData($user_name, $fac_code, $dept_code);
     echo "your fac=".$fac_code." your dept=".$dept_code;
   
?>
