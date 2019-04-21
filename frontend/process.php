<?php

$question = $_POST['question'];
$answer = $_POST['answer'];
$fp = fopen("log.html", 'a');

$bot_cont = '<div class="container">';
$user_cont = '<div class="container darker">';

$bot_img = '<img src="static/img/bot.png" alt="Avatar" style="width:100%;">';
$user_img = '<img src="static/img/user.png" alt="Avatar" class="right" style="width:100%;">';

$bot_msg = "<p>" . $question . "</p>";
$user_msg = "<p>" . $answer . "</p>";

$bot_full = $bot_cont . $bot_img . $bot_msg . "</div>";
$user_full = $user_cont . $user_img . $user_msg . "</div>";



fwrite($fp, $bot_full);
fwrite($fp, $user_full);


fclose($fp);

?>
