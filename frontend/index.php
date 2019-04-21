<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stima Chatbot</title>
  </head>

  <body>
    <div id="chatbox"></div>

    <form action="" method="POST">
      <input type="text" name="msg" id="msg" value="" />
      <input type="submit" name="send" value="Send" />
    </form>

    <script type="text/javascript" src="static/js/jquery-3.4.0.min.js"></script>
    <script>
      $("input[name='send']").click(function() {
        var usermsg = $("#msg").val();
        $.ajax({
          type: "POST",
          url: "http://localhost:5000/",
          contentType: "application/json; charset=utf-8",
          data: JSON.stringify({ question: usermsg }),
          success: function(result) {
            $.post("process.php", result);
          }
        });
        return false;
      });

      
    </script>
  </body>
</html>
