<?php

session_start(); ?>

<html>
  <head>
    <meta http-equiv="refresh" content="5;url=http://localhost/core/restore.php" />
    <title>Countdown Sample</title>
  </head>
  <body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
  <div align="center">
    Your cab/s is ariving in <span id="seconds">5</span>...
    <script>
      var seconds = 5;
      setInterval(
        function(){
          document.getElementById('seconds').innerHTML = --seconds;
        }, 1000
      );
    </script>
    </div>
  </body>
</html>
