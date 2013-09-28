<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * provide location information- name,latitude,longitude
 *
 */
?>
<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0">
  <channel>
    <title>Places</title>
  
    <description>Place Information- University of Moratuwa</description>
    <language>en-us</language>
    
    
<?php
 require_once  './LocationInfo.php'; 


 
 $locationInfo=new LocationInfo();
 
 
 $array2=$locationInfo->searchLocations();
 for ($i= 0; $i < count($array2); $i++) {
      echo '<place>';
      echo '<name>' .$array2[$i]["place"].'</name>';
      echo '<latitude>'.$array2[$i]["latitude"] .'</latitude>';
      echo '<longitude>' .$array2[$i]["longitude"] .'</longitude>';
      
      echo '</place>';
 }

    
    
?>

     </channel>
</rss>

