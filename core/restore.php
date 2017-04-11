<body background = "http://7-themes.com/data_images/out/12/6809612-simple-backgrounds.jpg">
<div align="center">

<?php

require_once('config.php');
require_once('functions.php');

// Start Session

session_start();

/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);

//var_dump($_SESSION['customer']);
$uname = $_SESSION['customer'];

$query = mysql_query("SELECT * FROM form3 WHERE uname = '$uname' ");

if(!$query)
{
	echo 'Customer not found.';
}
else
{
while($rows = mysql_fetch_array($query))
	{
		$_SESSION['vname'] = $rows['vname'];
		$_SESSION['vno'] = $rows['vno'];
		$_SESSION['ac'] = $rows['ac'];
        $_SESSION['toa'] = $rows['toa'];
		$_SESSION['location'] = $rows['location'];
	


$vname = $_SESSION['vname'];
$vno = $_SESSION['vno'];
$ac = $_SESSION['ac'];
$toa = $_SESSION['toa'];
$location = $_SESSION['location'];

$del = mysql_query("DELETE FROM form3 WHERE uname = '$uname' AND vno = '$vno' ");

if(!$query)
{
	echo 'Deletion Unsuccessful';
}
else
{
	$ins = mysql_query("INSERT INTO form2 VALUES( '$vname', '$vno', '$ac', '$toa', '$location')  ");
	if(!$ins)
		echo 'Insertion Unsucessful';
	else
	{
		echo '<br>Arrived at '.$location.'!';
		echo '<br>Have a safe journey!<br>';
		echo '<br /><a href="signin.php"> <h3>Exit</h3> </a>';
	}
}

}

}


?>

</div>
</body>