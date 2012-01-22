<?php
session_start();
print_r($_SESSION);
$_SESSION['test'] = 'hi';

if (isset($_POST['class'])) {
	require 'db.php';
	$admin = "Baiaboo";
	$class = htmlspecialchars($_POST['class']);
	$type = htmlspecialchars($_POST['type']);
	$location = htmlspecialchars($_POST['location']);
	$date = htmlspecialchars($_POST['date']);
	$timeStart = htmlspecialchars($_POST['timeStart']);
	$timeEnd = htmlspecialchars($_POST['timeEnd']);
	$description = htmlspecialchars($_POST['description']);
	$members = htmlspecialchars($_POST['members']);
	$query = "INSERT INTO groups (admin, class, type, location, date, timeStart, timeEnd, description, members) VALUES ('$admin','$class','$type','$location','$date','$timeStart','$timeEnd','$description','$members')";
	$result = mysql_query($query) or die(mysql_error());
	if ($result){
		echo "data successfully added!! :D";
	}else{
		echo "fatal error!!";
	}
	
}
?>


<html>
	<head></head>
	<body>
		<form action="createGroup.php" method="post">
			Class: <input type="text" name="class"></input><br />
			Type: <input type="text" name="type"></input><br />
 			Location: <input type="text" name="location"></input><br />
			Date: <input type="date" name="date" /><br />
			Start Time: <input type="time" name"timeStart" /><br />
			End Time: <input type="time" name="timeEnd" /><br />
			Description: <input type="text" name="description"></input><br />
			Members: <input type="text" name="members" /><br />			
			<input type="submit" />
		</form>
	</body>
</html>