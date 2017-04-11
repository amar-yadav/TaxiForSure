<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php

require_once('config.php');
require_once('functions.php');

// Start Session

session_start();

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	$_POST = f_clean($_POST);
	$vname = $_SESSION['vname'];
	$vno = $_SESSION['vno'];
	$ac = $_SESSION['ac'];
	$toa = $_SESSION['toa'];
	$location = $_SESSION['newlocation'];
	$uname = $_SESSION['user'];

	$del = mysql_query("DELETE FROM form2 WHERE vno = '$vno' ");

	if(!$del)
		echo 'Deletion unsuccessful';

	$ins = mysql_query("INSERT INTO form3 VALUES( '$vname', '$vno', '$ac', '$toa', '$location', '$uname' )   ");

	if(!$ins)
		echo 'Insertion unsuccessful';

	echo 'Your taxi has been booked!';
	echo '<form action = "signin.php">';
	echo '<input type = "submit" value = "Go to Main Page">';
	echo '</form>';

?>

</div>
</body>