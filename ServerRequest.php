<?php
/*
 * @author chamath sajeewa
 * chamaths.10@cse.mrt.ac.lk
 * 
 * ## only used for testing purposes now replaced by notification manager
 */
?>
<?php

// Message to be sent
$title="Mahapola Sign";  # = $_POST['message'];
$text="You Should sign mahapola before 5th May";

// Set POST variables
$url = 'https://android.googleapis.com/gcm/send';
$registration_id="APA91bFRSIVPUzDW4ptIUlEhsQTiIH1ORHAgbNZEkRg7TVbxZxo77yO6lIEfHkgyBytw5PfiheWaGgyUtHtody9Mw6r1xhUGbvQ0n1t6mA88OzdZSeh8B9aJKLnMrBbMCsg3y51T6HQUnRcKrfgDvsiSThBiuYTNVw";
$fields = array(
                'registration_ids'  => array($registration_id),
                'data'              => array( "title" => $title, "text"=>$text ) ,
                );

$headers = array( 
                    'Authorization: key='."AIzaSyDtmiJLnUJPcv1T1hPfFTuo8xPzMfm02pk",
                    'Content-Type: application/json'
                );
#echo "result";

// Open connection
$ch = curl_init();

// Set the url, number of POST vars, POST data
curl_setopt( $ch, CURLOPT_URL, $url );

curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
#echo "result";

curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

// Execute post
$result = curl_exec($ch);

// Close connection
curl_close($ch);

echo $result;

?>

