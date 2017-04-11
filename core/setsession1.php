<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php


require_once('config.php');
require_once('functions.php');

date_default_timezone_set('Asia/Kolkata');

// Start Session

session_start();

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);

    $_SESSION['vname'] = $_POST['vname'];
    $_SESSION['ac'] = $_POST['ac'];

    $vname = $_POST['vname'];
    $ac = $_POST['ac'];
	$uname = $_SESSION['user'];
	$from = $_SESSION['from'];

	$query = mysql_query("SELECT * FROM form1 WHERE uname = '$uname'");

	$row = mysql_fetch_array($query);

	$_SESSION['uname'] = $row['uname'];

	$query = mysql_query("SELECT * FROM form2 WHERE vname = '$vname' AND ac = '$ac' AND location = '$from' ");

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
		echo '<br><br>';

	}


echo '<br><br>Enter the Reg. no of one of the above, that you want to book.<br>';
echo '<form action = "setsession.php" method = "post"/>';
echo '<input type = "text" name = "vno">';
echo '<input type = "submit" value = "Book!"/>';
echo '</form>';


?>

</div>
</body>