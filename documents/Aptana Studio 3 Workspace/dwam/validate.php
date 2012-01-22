<?php
include_once 'common.php';
include_once 'db.php';

ini_set('display_errors',1);
error_reporting(E_ALL);

require 'db.php';
	$username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) : $_SESSION['username'];
	$password = isset($_POST['password']) ? mysql_real_escape_string($_POST['password']) : $_SESSION['password'];

if (isset($username)){
	
	$query = "SELECT password FROM users WHERE username=$username";
	$result = mysql_query($query)  or die(mysql_error());
	$password_hash = mysql_fetch_assoc($result)["password"];
	
	if ($password_hash == sha1($password)){
		$_SESSION['username'] = $username;
		echo "You have successfully logged in!! </br>";
	}else{
		echo "password not valid </br>!!";
	}
	 
}

if (!isset($_SESSION['username'])){
?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Log in!</title>
	</head>
	<body>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			Username: <input type="text" name="username"/><br />
			Password: <input type="password" name="password"/><br />
			<input type="submit" value="Log in" /> 
		</form>
	</body>
</html>


<?php

}else{
	header('location: index.php');
}
