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
      var usermsg = $("#msg").val();
      usermsgurlify = usermsg.trim().replace(/\s/g, '%20');
      var url = "http://127.0.0.1:5000/?question=";
      var totalurl = url.concat(usermsgurlify);

      $.get(totalurl, function(response, status){
        alert("Question: " + response["question"] + "\nResponse " + response["response"]);
        $.ajax({
            url: '/process.php',
            type: 'post',
            dataType: 'json',
            contentType: 'application/json',
            data: response
        });
      });
    });

    function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "log.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}

  setInterval (loadLog, 2500);

    </script>
  </body>
</html>
