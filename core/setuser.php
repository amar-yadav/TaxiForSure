<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php

require_once('config.php');
require_once('functions.php');

// Start Session

session_start();

/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);

$_SESSION['customer'] = $_POST['uname'];

$uname = $_SESSION['customer'];
	
	$query = mysql_query("SELECT * FROM form3 WHERE uname = '$uname' ");

	while($rows = mysql_fetch_array($query))
	{
		echo '<br> User Name: '.$rows['uname'];
		echo '<br>   Vehicle Name: '.$rows['vname'];
		echo '<br>Vehicle Reg. No: '.$rows['vno'];
		echo '<br>             AC: '.$rows['ac'];
		echo '<br>Time of arrival: '.$rows['toa'];
		echo '<br>Arriving at: '.$rows['location'].'<br><br>';
	}

	if(mysql_num_rows($query) == 0)
	{
		echo '<br>You have not booked with us yet!';
		mysql_close();
		echo '<br /><a href="signin.php"> <h3>Go Back</h3> </a>';
	}

	else
	{
		mysql_close();
		echo '<br /><a href="countdown.php"> <h3>Continue</h3> </a>';
	}


?>

</div>
</body>