<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Karen</title>
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
  </head>

  <body>
    <div class = "chatbox_white">
      <div class = "chatlogs" id= "chatbox">
        

    </div>

    <div class="chat-form">
        <form action="" method="POST">
          <input type="text" name="msg" id="msg" value="" />
          <button type="submit" name="send" value="Send">Send</button>
        </form>
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
              console.log("reload");;
            }
          });
        });
      }

      setInterval(start, 2000);
      
    </script>
  </body>
</html>
