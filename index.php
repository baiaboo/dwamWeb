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
	
	//to check if the username exists:
	if (mysql_num_rows($result)<1){
		error("Please enter a valid username!!");
	}
	
	//check if the password is correct:
	$row = mysql_fetch_array($result) or die(mysql_error());
	$passwordFromQuery = $row['password'];
	if ($password == $passwordFromQuery){
		$_SESSION['username']=$username;
		header('location: home.php');
	}else{
		error("Your username password combination is not valid. Please try again!!");	}
}

?>

<?php

require '../src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '312594408777411',
  'secret' => 'b68a4f0bf9e84747f51ad0f8c6e189e1',
));

// See if there is a user from a cookie
$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
  }
}

?>

<html>
	<head>
		<title> DWAM: Don't Work Alone @ MIT </title>
		<link rel="stylesheet" type="text/css" href="index_style.css" />
	</head>
	<body>
    
		<div id=container>
			<div id=header>
				<div id=logo>
					<img src="images/logo.jpg" height = "100px">
				</div>
				<div id=login>
					<form action="index.php" method="post">
						Username: <input type="text" name="username"/>
						Password: <input type="password" name="password"/>
						<input type="submit" value="Log in" /> 
					</form>
					<p> Haven't registered yet? You can <a href = "sign_up.php"> sign up now!</a></p>
				</div>
			</div>
			<div id="mainbody" align="center">
				<img src = "images/index_image.jpg" width = "1200px">
			</div>
		</div>
	</body>
</html>

