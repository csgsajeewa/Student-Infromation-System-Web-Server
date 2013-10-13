<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * use to send profile details to user 
 *
 */
?>


<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0">
  <channel>
    <title>Account Details</title>
    <description>User Information </description>
    <language>en-us</language>

<?php

          require_once  'CustomerInfo.php'; 
          require_once './UserNewsRegInfo.php';
         $customerInfo=new CustomerInfo();
       
           $index_number=trim($_GET["index"]);
           $array=$customerInfo->searchByIndex($index_number);// get user details from the table


 ###################format data as XML document#####################################
   echo '<item>';
   echo '<title>' ."user information".'</title>';
   echo '<index>'.$array["index_number"] .'</index>';
   echo '<first_name>' .$array["first_name"] .'</first_name>';
   echo '<last_name>'.$array["last_name"]. '</last_name>';
   echo '<department>'.$array["department"]. '</department>';
   echo '<faculty>'.$array["faculty"]. '</faculty>';
   echo '<year>'.$array["year"]. '</year>';
   echo '<semester>'.$array["semester"]. '</semester>';
   echo '<email>'.$array["email"]. '</email>';
   echo '<isRegistered>'.$array["registered"]. '</isRegistered>';
   echo '</item>';
###########################################################################################
?>


    </channel>
</rss>



