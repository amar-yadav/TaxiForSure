<div align="center">

<?php

require_once('config.php');
require_once('functions.php');

// Start Session

session_start();

    //echo 'Inside process0.php';
	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	$_POST = f_clean($_POST);

	/*These are the main variables we'll use to process the form.*/
	$from = $_POST['from'];
	$to = $_POST['to'];
	$uname = $_SESSION['user'];
	$_SESSION['newlocation'] = $to;

	if($from === $to)
	{
		echo 'Destination and Source can\'t be same. Please re-enter choices.';
		echo '<br /><a href="demo-form.php"> <h3>Go Back</h3> </a>';
	}
	
//	echo 'Variables recieved User Name = '.$uname.', pwd = '.$pwd;
	
	/*Check for corresponding value in database.*/
	$result = mysql_query("SELECT * FROM form2 WHERE location = '$from'");
    
	if($result === FALSE)
		die(mysql_error());

if ( !mysql_num_rows($result) ) {
		echo 'We\'re sorry but no taxis are available now. You could choose another source.';
		echo '<form action = "demo-form.php" method = "post">';
		echo '<input type = "submit" name = "Go Back">';
		echo '</form><br><br>';
		echo '<form action = "exit.php" method = "post">';
		echo '<input type = "submit" name = "Exit">';
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
		echo '<form action = "transit.php" method = "post">';
		echo '<br>   Vehicle Name: '.$rows['vname'].'<span style="padding-left:80px"><input type = "submit" value = "Book"></span>';
		echo '<br>Vehicle Reg. No: '.$rows['vno'];
		echo '<br>             AC: '.$rows['ac'];
		echo '<br>Time of arrival: '.$rows['toa'].' minutes';
		echo '</form>';
	}

}	

	/*Close our database connection.*/
	mysql_close();

?>

</div>