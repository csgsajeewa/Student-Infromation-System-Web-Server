<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0">
  <channel>
    <title>New Orders</title>
    <link>http://localhost/p_3/salesManagerForm.html/ </link>
    <description>Orders for constructions </description>
    <language>en-us</language>





<?php

          require_once  'CustomerInfo.php'; //it must be there otherwise wont work
         $customerInfo=new CustomerInfo();
           $index_number=trim($_GET["index"]);
           $array=$customerInfo->searchByIndex($index_number);



    echo '<item>';
   echo '<title>' ."user information".'</title>';
   echo '<index>'.$array["index_number"] .'</index>';
    echo '<first_name>' .$array["first_name"] .'</first_name>';
    echo '<last_name>'.$array["last_name"]. '</last_name>';
   echo '</item>';

?>


    </channel>
</rss>



