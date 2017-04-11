<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
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
	$table = $_POST['formID'];
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$_SESSION['user'] = $uname;
	$i = 1;
	
	/*Check for corresponding value in database.*/
	$result = mysql_query("SELECT * FROM form1 WHERE uname = '$uname'");
    
	if($result === FALSE)
		die(mysql_error());
	
	while($rows = mysql_fetch_array($result))
	{
		$chk_pwd = $rows['pwd'];
		if(crypt($pwd, $chk_pwd) == $chk_pwd)
			$GLOBALS['i'] = 2;
	}
	
	if ( $i == 1 ) {
		echo 'No such User exists! You can go back or Sign up.<br><br><br>';
		echo '<form action = "signin.php" method = "post">';
		echo '<input type = "submit" value = "Go Back">';
		echo '</form>';
		echo '<br>';
		echo '<form action = "signup.php" method = "post">';
		echo '<input type = "submit" value = "Sign Up">';
		echo '</form>';
	}
	else
	{   
        //echo $i; 
		//$query = mysql_query("SELECT * FROM form1 WHERE name = '$uname' && pwd = '$pwd'");
		header('Location: demo-form.php');
	}
	
	/*Close our database connection.*/
	mysql_close();

	/*Redirect the user after a successful form submission*/
	// Works if session cookie was accepted
//echo '<br /><a href="demo-form.php"> <h3>Continue</h3> </a>';

// Or maybe pass along the session id, if needed
//echo '<br /><a href="demo-form.php?' . SID . '"> <h3>Continue</h3> </a>';

?>
</div>
</body>