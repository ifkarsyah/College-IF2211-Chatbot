<?php

$question = $_POST['question'];
$answer = $_POST['response'];
$fp = fopen("log.html", 'a');
fwrite($fp, "<div>" . $question . "<br> </div>");
fwrite($fp, "<div>" . $answer . "<br> </div>");


curl_close ($ch);
fclose($fp);

?>
