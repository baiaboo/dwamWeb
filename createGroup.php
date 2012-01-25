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
    	<link rel="stylesheet" type="text/css" href="createGroup_style.css" />
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
        
			<h1>Create Your Group</h1>
        
			<form class="form" action="createGroup.php" method="post">
        		<p class="class">
					<label for="class">Class</label>
					<input type="text" name="class"></input></p><br />
             
            	<p class="type">
            		<label for="type" >Type of group</label>
                	<select name = "type">
					<option value = "pset">Pset Group</option>
					<option value = "project">Project Group</option>
					<option value = "study">Study Group</option>
					<option value = "other">Other</option>
					</select></p><br />
            
            	<p class="location">
            		<label for="location" >Location</label>
 					<input type="text" name="location"></input></p><br />
             
            	<p class="date">
            		<label for="date" >Date</label>
					<input type="date" name="date" value ="MM/DD/YY" onFocus="clearMe(this)" onBlur="populateMe(this)"/></p><br />
                
            	<p class="timeStart">
            		<label for="timeStart" >Start Time</label>
					<input type="time" name"timeStart" value = "HH:MM" onFocus="clearMe(this)" onBlur="populateMe(this)" /></p><br />
                
            	<p class="timeEnd">
            		<label for="timeEnd" >End Time</label>
					<input type="time" name="timeEnd" value = "HH:MM" onFocus="clearMe(this)" onBlur="populateMe(this)"/></p><br />
                
            	<p class="description">
            		<label for="description" >Description</label>  
                	<textarea name="description"></textarea></p><br />
             
            	<p class="members">
             		<label for="members" >Number of Members</label>
                	<input type="text" name="members" /></p><br />	
             			
				<p class="submit">
            		<input type="submit" value="Create Group" /></p>
			</form>
        </div>
	</body>
</html>