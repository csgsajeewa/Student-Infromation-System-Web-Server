<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 *  ##provide news of corresponding user- xml parser will be used to retrieve data 
 */
?>
<?php header('Content-Type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0">
  <channel>
    <title>News Items</title>
  
    <description>News Items For User</description>
    <language>en-us</language>
    
    
<?php
 require_once  'UserNewsRegInfo.php'; 
 require_once 'NewsInfo.php';

 $user_name=  trim($_GET['index']);
 
 $userNewsRegInfo=new UserNewsRegInfo();
 $newsInfo=new NewsInfo();
 $array1=$userNewsRegInfo->searchByIndex($user_name);   
 $fac_code=  $array1["fac_code"];
 $dept_code=  $array1['dept_code'];
 
 $array2=$newsInfo->searchNews($fac_code, $dept_code);
 for ($i= 0; $i < count($array2); $i++) {
      echo '<item>';
      echo '<title>' .$array2[$i]["heading"].'</title>';
      echo '<details>'.$array2[$i]["details"] .'</details>';
      echo '<date>' .$array2[$i]["date"] .'</date>';
      
      echo '</item>';
 }

    
    
?>

     </channel>
</rss>
