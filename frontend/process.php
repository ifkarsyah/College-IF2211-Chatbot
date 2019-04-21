<?php

$question = $_POST['question'];
$answer = $_POST['answer'];
$fp = fopen("log.html", 'a');
fwrite($fp, "<div>" . $question . "<br> </div>");
fwrite($fp, "<div>" . $answer . "<br> </div>");


fclose($fp);

?>
