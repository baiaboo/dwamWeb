<html>
	<head>
		<title>Php Trial</title>
	</head>
	<body>
		<h1>Classes</h1>
		<h2>Users</h2>
		<?php
		require 'db.php';
		error_reporting(E_ALL);
		$query = "SELECT * FROM groups";
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result)) {
			echo $row['location'];
			echo '<br>';
		}		
		?>
	</body>
</html>