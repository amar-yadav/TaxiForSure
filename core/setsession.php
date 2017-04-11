<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php

require_once('config.php');
require_once('functions.php');

date_default_timezone_set('Asia/Kolkata');

// Start Session

session_start();

    //echo 'Inside process0.php';
	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);

    $_SESSION['vno'] = $_POST['vno'];
    $vno = $_POST['vno'];
	$uname = $_SESSION['user'];

	$query = mysql_query("SELECT * FROM form1 WHERE uname = '$uname'");

	$row = mysql_fetch_array($query);

	$_SESSION['uname'] = $row['uname'];

	$query = mysql_query("SELECT * FROM form2 WHERE vno = '$vno' ");

	while($rows = mysql_fetch_array($query))
	{
		//echo '<form action = "transit.php" method = "post">';
		echo '<br>   Vehicle Name: '.$rows['vname'];
		$_SESSION['vname'] = $rows['vname'];
		echo '<br>Vehicle Reg. No: '.$rows['vno'];
		echo '<br>             AC: '.$rows['ac'];
        $_SESSION['ac'] = $rows['ac'];
		echo '<br>Time of arrival: '.$rows['toa'].' minutes';
		$_SESSION['toa'] = $rows['toa'];

	}


echo '<form action = "book.php">';
echo '<input type = "submit" value = "Book!">';
echo '</form>';


?>

</div>
</body>