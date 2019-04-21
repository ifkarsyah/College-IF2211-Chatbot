<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Karen</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css"> -->
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
  </head>

  <body>
    <div class = "chatbox_white">
      <div class = "chatlogs" id= "chatbox">
        
        <div class ="chat bot">
          <div class="user-photo"><img src="static/giphy.gif"></div>
          <p class = "chat-message">Halo namaku Karen  </p>
        </div>
        <div class ="chat me">
          <!-- <div class="user-photo"><img src="img/player.png"></div>
          <p class = "chat-message">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p> -->

        </div>

    </div>

    <div class="chat-form">
        <form action="" method="POST">
          <input type="text" name="msg" id="msg" value="" />
          <button type="submit" name="send" value="Send">Send</button>
        </form>
      </div>


    <div id="chatbox" class="scroll" style="overflow-y: auto;">
  
    </div>


    <script type="text/javascript" src="static/js/jquery-3.4.0.min.js"></script>
    <script>
      $("button[name='send']").click(function() {
        var usermsg = $("#msg").val();
        $.ajax({
          type: "POST",
          url: "http://localhost:5000/",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify({ question: usermsg }),
          success: function(result) {
            $.post("process.php", result);
            console.log(result);
          }   
        });
        return false;
      });
      function start() {
        $(document).ready(function(){
          $.ajax({
            type: "GET",
            url: "log.html",
            success: function(result) {
              $('#chatbox').load("log.html");
            }
          });
        });
      }

      setInterval(start, 2000);
      
    </script>
  </body>
</html>
