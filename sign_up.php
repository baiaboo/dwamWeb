<?php
include 'common.php';
session_start();

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
	
		header('location: index.php');
	}

}

?>


<html>

	<head>
    <link rel="stylesheet" type="text/css" href="sign_up_style.css" />
    </head>

	<body>
    	<div id="container">
        	<div id="topBanner">
				<img src="images/Masthead.jpg" width="1000" height="90">
				<div id="bannerLinks"><p>Welcome, <?=$username?> | <a href="#"> Log Out</a></p></div>
			</div>
	<div id="navigationbar">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="createGroup.php">Create a group</a></li>
				<li><a href="#">My Groups</a></li>
				<li><a href="#">Find friends</a></li>
			</ul> 
			</div>
            
			<h1>Welcome to DWAM!</h1>
            <h2>Please choose a Username and Password.</h2>

		<form class="form" action="sing_up.php" method="post">
        	<p class="username">
					<label for="username">Username</label>
					<input type="text" name="username"></input></p><br />
                    
            <p class="password">
					<label for="class">Password</label>
					<input type="password" name="class"></input></p><br />
            
            <p class="addClass">
					<label for="addClass">Add a Class</label>
					<input type="text" name="class1"></input></p><br />
            
            <p class="addclass">
					<label for="class">Add a Class</label>
					<input type="text" name="class2"></input></p><br />

			<p class="submit">
				<input type="submit" /></p>

		</form>
        </div>

	</body>

</html>