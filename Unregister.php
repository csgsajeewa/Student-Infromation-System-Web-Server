<?php

 #used to deregister students from news service 
 require_once './UserNewsRegInfo.php';
 $userNewsRegInfo=new UserNewsRegInfo();

 $index_number=trim($_GET['index']);
 $userNewsRegInfo->unregister($index_number);
 echo 'You Have Unregistered From The Service Sucessfully.'
?>
