<?php
$host = 'sql.mit.edu';
$username = 'baiaboo';
$password = 'password';
$db = mysql_connect($host, $username, $password) or die('Could not connect: ' . mysql_error());
mysql_select_db('baiaboo+Groups',$db);
?>

