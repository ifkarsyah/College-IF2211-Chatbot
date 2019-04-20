<?php

$msg = $_POST['msg'];
$fp = fopen("log.html", 'a');
fwrite($fp, "<div>" . $msg . "<br> </div>");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://localhost:5000/");
curl_setopt($ch, CURLOPT_POSTFIELDS,"question=$msg");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec ($ch);
if ($result == "OK") { 
    fwrite($fp, "<div>" . $result . "<br> </div>");
}

curl_close ($ch);
fclose($fp);

?>
