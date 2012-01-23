<?php
$query = "SELECT * FROM UserAndClasses WHERE username='$username'";
$result = mysql_query($result) or die(mysql_error());
if (mysql_num_rows($result)<1){
	error("oh no!!");
}else{
	echo "fuck yeah!";
}
while ($row = mysql_fetch_array($result)){
	$class = $row['class'];
	echo "<li><a href='#'>$class</a></li>";

}
?>