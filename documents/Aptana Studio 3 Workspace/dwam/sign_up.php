<?php
include 'common.php';
session_start();

print_r($_SESSION);

$_SESSION['test'] = 'hi';



if (isset($_POST['username'])) {
	
	if ($_POST['username']=='' or $_POST['password']==''or $_POST['class1']=='' or $_POST['class2']==''){
		error('One or more required fields were left blank.\\n'.
		'Please fill them in and try again.');
	}

	require 'db.php';

	$username = mysql_real_escape_string($_POST['username']);

	$password = mysql_real_escape_string($_POST['password']);

	$class1 = mysql_real_escape_string($_POST['class1']);

	$class2 = mysql_real_escape_string($_POST['class2']);

	$password = sha1($password);

	$query = "SELECT COUNT(*) FROM users WHERE username='$username'";

	$result = mysql_query($query) or die('bad query');

	if (!$result) {
		error('A database error occurred in processing your '.
		'submission.\\nIf this error persists, please '.
		'contact dwam@mit.edu.');		

	}
	if (@mysql_result($result,0,0)>0) {
		error('A user already exists with your chosen userid.\\n'.
		'Please try another.');
	} else {

		$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

		$result = mysql_query($query) or die(mysql_error());

		echo "username is ".$username;

		$query2 = "INSERT INTO UserAndClasses (username,class) VALUES ('$username','$class1')";

		$result = mysql_query($query2) or die(mysql_error());

		$query3 = "INSERT INTO UserAndClasses (username,class) VALUES ('$username','$class2')";

		$result = mysql_query($query3) or die(mysql_error());
		
		echo "Registration was successful!! ";
		echo '<a href="validate.php">Login here! </a> ';
	}

}

?>


<html>

	<head></head>

	<body>

		<form action="sign_up.php" method="post">

			Username: <input type="text" name="username"></input><br />

			Password: <input type="password" name="password"></input><br />

			Add Class: <input type="text" name="class1"></input><br />

			Add Class: <input type="text" name="class2"></input><br />

			<input type="submit" />

		</form>

	</body>

</html>