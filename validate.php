<?php
include_once 'common.php';
include_once 'db.php';
session_start();

ini_set('display_errors',1);
error_reporting(E_ALL);

if (isset($_POST['username'])){
	
	//$username = isset($_POST['username']) ? mysql_real_escape_string($_POST['username']) : $_SESSION['username'];
	//$password = isset($_POST['password']) ? mysql_real_escape_string($_POST['password']) : $_SESSION['password'];
	
	if ($_POST['username']=='' or $_POST['password']==''){
		error('One or more required fields were left blank.\\n'.
		'Please fill them in and try again.');
	}
	
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$query = "SELECT * FROM users WHERE username='$username'";
	$result = mysql_query($query)  or die(mysql_error());
	$row = mysql_fetch_array($result) or die(mysql_error());
	$passwordFromQuery = $row['password'];
	if ($password == $passwordFromQuery){
		$_SESSION['username']=$username;
		header('location: index.php');
	}else{
		echo "oh no!!";
		echo "u typed $password but in reality it is $passwordFromQuery";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Log in!</title>
	</head>
	<body>
		<p>You must log in to access this area of the site. If you are
			not a registered user, <a href="sign_up.php">click here</a>
			to sign up for instant access!</p>
		<form action="validate.php" method="post">
			Username: <input type="text" name="username"/><br />
			Password: <input type="password" name="password"/><br />
			<input type="submit" value="Log in" /> 
		</form>
	</body>
</html>

