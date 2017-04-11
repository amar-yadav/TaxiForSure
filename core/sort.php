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

$from = $_SESSION['from'];
$to = $_SESSION['newlocation'];
$uname = $_SESSION['user'];

if($from === $to)
{
		echo 'Destination and Source can\'t be same. Please re-enter choices.';
		echo '<br /><a href="demo-form.php"> <h3>Go Back</h3> </a>';
}
	
else
{
//	echo 'Variables recieved User Name = '.$uname.', pwd = '.$pwd;
	
	/*Check for corresponding value in database.*/
	$result = mysql_query("SELECT * FROM form2 WHERE location = '$from' ORDER BY toa");
    
	if($result === FALSE)
		die(mysql_error());

if ( !mysql_num_rows($result) ) {
		echo 'We\'re sorry but no taxis are available now. You could choose another source.';
		echo '<form action = "demo-form.php" method = "post">';
		echo '<input type = "submit" value = "Go Back">';
		echo '</form><br><br>';
		echo '<form action = "exit.php" method = "post">';
		echo '<input type = "submit" value = "Exit">';
		echo '</form>';
	}

	else
{
$temp = mysql_query("SELECT * FROM form1 WHERE uname = '$uname'");
$row = mysql_fetch_array($temp);
$username = $row['name'];
	echo '<h1>We have the following cabs available for you, '.$username.'.</h1>';
	
while($rows = mysql_fetch_array($result))
	{
		//echo '<form action = "transit.php" method = "post">';
		echo '<br>   Vehicle Name: '.$rows['vname'];
		echo '<br>Vehicle Reg. No: '.$rows['vno'];
		echo '<br>             AC: '.$rows['ac'];
		echo '<br>Time of arrival: '.$rows['toa'].' minutes';
		echo '<br>';
	}
	

echo '<br><br>Enter the Reg. no of one of the above, that you want to book.<br>';
echo '<form action = "setsession.php" method = "post"/>';
echo '<input type = "text" name = "vno">';
echo '<input type = "submit" value = "Book!"/>';
echo '</form>';


echo '<br><br>Or alternatively you can choose a car of your choice.<br>';
echo '<form action = "setsession1.php" method = "post"/>';
echo 'Search Name: <input type = "text" name = "vname"><br>';
echo 'AC/Non-AC (AC = 1, Non-Ac = 0): <input type = "text" name = "ac"><br>';
echo '<input type = "submit" value = "Book!"/>';
echo '</form>';


}

}
	
	/*Close our database connection.*/
	mysql_close();

?>

</div>
</body>