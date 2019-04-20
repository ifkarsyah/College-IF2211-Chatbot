<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Stima Chatbot</title>
  </head>
  <body>
    <div id="chatbox"> 
      
    </div>

    <form action="" method="POST">
      <input type="text" name="msg" id="msg" value="" />
      <input type="submit" name="send" value="Send" />
    </form>

    <script type="text/javascript" src="static/js/jquery-3.4.0.min.js"></script>
    <script>
    $("input[name='send']").click(function() {
        dataReq = {
          question : $("#msg").val(),
        };
        // console.log(JSON.stringify(dataReq));
        $.ajax({
            crossDomain: true,
            type: 'post',
            dataType: 'jsonp',
            url : 'http://127.0.0.1:5000/',           
            contentType: 'application/json;charset=UTF-8',
            data: JSON.stringify(dataReq),
            success: function() { 
              alert("Success"); 
            },  
            error: function (xhr, status) {
              alert("error");
            }
        });   
        $("#msg").attr("value", "");
        return false;  
    });


      function loadLog() {
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
          $.ajax({
          url: "log.html",
          cache: false,
          success: function(html) {
            $("#chatbox").html(html);        
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if (newscrollHeight > oldscrollHeight) {
              $("#chatbox").animate({ scrollTop: newscrollHeight }, "normal");
            }
          }
        });
      }

      setInterval(loadLog, 2000);
    </script>
  </body>
</html>
