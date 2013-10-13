<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 *  #used to deregister students from news service 
 */
?>

<?php


 require_once './UserNewsRegInfo.php';
 $userNewsRegInfo=new UserNewsRegInfo();

 $index_number=trim($_GET['index']);
 $userNewsRegInfo->unregister($index_number);
 echo 'You Have Unregistered From The Service Sucessfully.'
?>
