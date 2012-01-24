<?php
session_start();

if (isset($_POST['class'])) {
	require 'db.php';
	$admin = $_SESSION['username'];
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
	<head>
		<script type="text/javascript">
		function clearMe(formfield) {
			if(formfield.value == formfield.defaultValue){
				formfield.value = '';
			}
		}
		function populateMe(formfield) {
			if(formfield.value == ''){
				formfield.value=formfield.defaultValue;}
		}
		</script>
	</head>
	<body>
		<h3>Create Your Group!</h3>
		<form action="createGroup.php" method="post">
			Class: <input type="text" name="class"></input><br />
			Type of group: <select name = "type">
				<option value = "pset">Pset Group</option>
				<option value = "project">Project Group</option>
				<option value = "study">Study Group</option>
				<option value = "other">Other</option>
			</select><br />
 			Location: <input type="text" name="location"></input><br />
			Date: <input type="date" name="date" value ="MM/DD/YY" onfocus="clearMe(this)" onblur="populateMe(this)"/><br />
			Start Time: <input type="time" name"timeStart" value = "HH:MM" onfocus="clearMe(this)" onblur="populateMe(this)" /><br />
			End Time: <input type="time" name="timeEnd" value = "HH:MM" onfocus="clearMe(this)" onblur="populateMe(this)"/><br />
			Description: <input type="text" name="description"></input><br />
			Members: <input type="text" name="members" /><br />			
			<input type="submit" value="Create Group" />
		</form>
	</body>
</html>