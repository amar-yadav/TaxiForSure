<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php
require_once('config.php');
require_once('functions.php');
error_reporting(E_ALL ^ (E_NOTICE|E_DEPRECATED));

session_start();

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	$_POST = f_clean($_POST);

	/*These are the main variables we'll use to process the form.*/
	$table = $_POST['formID'];
	$uname = test_input($_POST['uname']);
	$pwd = crypt($_POST['pwd']);
	$name = test_input($_POST['name']);
	$no = test_input($_POST['no']);
	$sex = test_input($_POST['sex']);

    $_SESSION['user'] = $uname;

	/*Insert out values into the database.*/
	$result = mysql_query("INSERT INTO $table (uname, pwd, name, no, sex) VALUES ('$uname', '$pwd', '$name', '$no', '$sex')");
	

	if (!$result) {
		die('User name already exists!, Please choose another user name, //Error: ' . mysql_error());
	}
	
	echo 'User successfully signed up!<br>';

	/*Close our database connection.*/
	mysql_close();

// Works if session cookie was accepted
//echo '<br /><a href="demo-form.php"> <h3>Continue</h3> </a>';

// Or maybe pass along the session id, if needed
//echo '<br /><a href="demo-form.php?' . SID . '"> <h3>Continue</h3> </a>';


	/*Redirect the user after a successful form submission*/
	echo '<form action = "demo-form.php" method = "post">';
	echo '<input type = "submit" value = "Continue">';
    echo '</form>';	

?>

</div>
</body>