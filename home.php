<?php
require 'db.php';
include_once 'common.php';
session_start();


ini_set('display_errors',1);
error_reporting(E_ALL);
$username = $_SESSION['username'];
?>
<html>
	<head>
		<title> "DWAM: Don't Work Alone @ MIT"</title>
		<link rel="stylesheet" type="text/css" href="home_style.css" />
		<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
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
			<!-- left content/class menu -->
			<div id="leftContent">
				<ul>
					
<?php
// helper function here:
if (isset($_GET['run'])) $linkchoice=$_GET['run'];
else $linkchoice='';

switch($linkchoice){

case 'first' :
    createMiddleContent($_GET['arg']);
    break;

}


$query = "SELECT * FROM UserAndClasses WHERE username='$username'";
$result = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($result)<1){
	error("oh no!!");
}
while ($row = mysql_fetch_array($result)){
	$class = $row['class'];
	echo "<li><a href='?run=first&arg=$class'>$class</a></li>";

}
?>
	
				</ul>
			</div>
			
			<!-- side content/ newsfeed -->

			<div id="rightContent">
				<div id="nf1">kjdfadskl kjsadlfk sdklj</div>
				<div id="nf2">dsjfhadskjfh flakjdshfjlkash</div>
				<div id="nf3">adsjfhasl adskjfhasdlkjh</div>
			</div>
			
<?php
// things to do:
//show the most recent ones, show top 4
function createMiddleContent($class){
	$query = "SELECT * FROM groups WHERE class='$class'";
	$result = mysql_query($query) or die(mysql_error());
	$count = 0;
	while ($row = mysql_fetch_array($result) and ($count<5)){
		$count = $count +1;
		$type = $row['type'];
		$location = $row['location'];
		$date = $row['date'];
		$timeStart = $row['timeStart'];
		$timeEnd = $row['timeEnd'];
		$description = $row['description'];

		//<!-- middle content, groups display -->
			echo "<div id='middleContent'>";
				echo "<div class='roundRectangle'>";
					echo "<div class ='groupName'>$class  $type  " . "Group</div>";
					echo "<div class = 'groupLogistics'>Location: $location  |  Date: $date  |  Time: $timeStart - $timeEnd</div>";
					echo "<div class = 'groupDescription'>$description</div>"; 
				echo "</div>";
	}
	//checking if endDiv is required:
	if (mysql_num_rows($result)>0){
		echo "</div>";
	}
}
?>

			
		</div>
	</body>
</html>