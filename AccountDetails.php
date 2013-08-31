<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<?php echo '<rss version="2.0"> ' ; ?>





<?php

          require_once  'CustomerInfo.php'; //it must be there otherwise wont work
          $customerInfo=new CustomerInfo();
            $index_number="100470N";//trim($_GET["index"]);
            $array=$customerInfo->searchByIndex($index_number);



    echo '<item>';
    echo '<title>' ."user information".'</title>';
    echo '<index>'.$array("index_number") .'</index>';
    echo '<first_name>' .$array("first_name") .'</first_name>';
    echo '<description>'.$array("last_name"). '</last_name>';
    echo '</item>';

?>


<?php echo '</rss> ' ; ?>
