<div align="center">
<?php

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


/*Cleans an array to protect against injection attacks.*/
function f_clean($array) {
    return array_map('mysql_real_escape_string', $array);
}

/*Connects to and selects the specified database with the specified user.*/
function f_sqlConnect($user, $pass, $db) {
	$link = mysql_connect('localhost', $user, $pass);

	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db($db, $link);

	if (!$db_selected) {
		die('Can\'t use ' . $db . ': ' . mysql_error());
	}
}

?>
</div>
