<?php

#used to deregister students from news service
require_once './UserNewsRegInfo.php';
$userNewsRegInfo=new UserNewsRegInfo();

 $index_number=trim($_GET['index']);
 $userNewsRegInfo->deregister($index_number);
 echo 'You have deregistered from the service sucessfully!!!!!!!!!!!!'
?>
