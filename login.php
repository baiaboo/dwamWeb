
<html>
	<head>
		<title>Log in!</title>
	</head>
	<body>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			Username: <input type="text" name="username"/><br />
			Password: <input type="password" name="password"/><br />
			<input type="submit" value="Log in" /> 
		</form>
	</body>
</html>