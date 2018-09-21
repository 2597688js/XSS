<!DOCTYPE HTML>
<html lang="en_US">
<head>
	<meta charset="UTF-8">
	<title>Index </title>

	<link rel="stylesheet" type="text/css" href="intern.css">
</head>
<body style="margin-top:5%;">
	<h1 align="center">Login Page</h1>
	<form action="showdetails.php" method="get">
		<table align="center" border="1">
			<tr>
				<td>Username</td><td><input type="text" name="uname" style="background-color:#f2f2f2"></td>
			</tr>
			<tr>
				<td>Password</td><td><input type="password" name="pwd" style="background-color:#f2f2f2"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="submit" value="Show info" ></td>
			</tr>
			
		</table>
	</form>
				
</body>
</html>
<?php
	
	
	//$username = $_GET['uname'];
	//$_SESSION['uid'] = '$username';
	
?> 