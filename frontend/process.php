<?php

$question = $_POST['question'];
$answer = $_POST['answer'];


$fp = fopen("log.html", 'a') or die("can't open file");

$user_cont = '<div class = "chat me">';
$bot_cont  = '<div class = "chat bot">';

$user_img = '<div class="user-photo"><img src="static/img/user.png"></div>';
$bot_img  = '<div class="user-photo"><img src="static/giphy.gif"></div>';

$user_msg = '<p class = "chat-message">' . $question . "</p>";
$bot_msg  = '<p class = "chat-message">' . $answer . "</p>";

$user_full = $user_cont . $user_img . $user_msg . "</div>";
$bot_full = $bot_cont . $bot_img . $bot_msg . "</div>";

fwrite($fp, $user_full);
fwrite($fp, $bot_full);

fclose($fp);
?>
