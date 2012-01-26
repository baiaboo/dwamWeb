<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="groupDash.css" />
</head>

<body>

<?php
$username="username";
$password="password";
$database="your_database";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM tablename";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();
?>

<?php


	echo "<div class ='groupName'>$class  $type  " . "Group</div>";
	echo "<div class = 'location'><h1>Location</h1>$location</div>";
	echo "<div class 'date'><h1>Date</h1>$date</div>";
	echo "<div class ='time'><h1>Time</h1> $timeStart = $timeEnd</div>";
	echo "<div class = 'description'><h1>Description</h1>$description</div>";
	echo "<div class = 'members'><h1>Members</h1>$members</div>";  
	
?>

</body>
</html>