

<?php header('Content-Type: text/xml'); 
## used to provide news to users - this script is called by mobile client ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0">
  <channel>
    <title>News Items</title>
    <link>http://localhost/p_3/salesManagerForm.html/ </link>
    <description>News Items</description>
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

    
    
?>
