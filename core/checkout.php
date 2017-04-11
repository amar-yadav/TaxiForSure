<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php

session_start();

echo 'Enter username';
echo '<form action = "setuser.php" method = "post" >';
echo '<input type = "hidden" name = "formID" value = ""/>';
echo '<input type = "hidden" name = "redirect_to" value = "www.google.com"/>';
echo '<p>User Name: <input type = "text" name = "uname"></p>';
echo '<input type = "submit" value = "Check">';
echo '</form>';

?>

</div>
</body>