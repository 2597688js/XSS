
<!DOCTYPE HTML>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>CSRF</title>

		<link rel="stylesheet" type="text/css" href="intern.css">
	</head>

	<body>


	<h1 align="center">Vulnerability: Cross Site Request Forgery (CSRF)</h1>

	<a href="admindash.php">Back</a>

	<div class="showLeft">
		<a href="xss_s.php">XSS</a>
		<div class="logout">
		<a href="logout.php">Logout</a>
		</div>
	</div>

	<div align="center" style="margin-top:15%;">

		<form action="#" method="GET">
			New password:<br />
			<input type="password" AUTOCOMPLETE="off" name="password_new" style="background-color:#f2f2f2"><br />
			Confirm new password:<br />
			<input type="password" AUTOCOMPLETE="off" name="password_conf" style="background-color:#f2f2f2"><br />
			<br />
			<input type="submit" value="Change" name="Change">

		</form>
	</div>

	</body>

</html>


<?php

session_start();
$jana = $_SESSION['usr'];

include('dbconn.php');


if( isset( $_GET[ 'Change' ] ) ) {
	// Get input
	$pass_new  = $_GET[ 'password_new' ];
	$pass_conf = $_GET[ 'password_conf' ];

	// Do the passwords match?
	if( $pass_new == $pass_conf ) {
		// They do!
		
		// Update the database
		$insert = "UPDATE `balance` SET `password`='$pass_new' WHERE `name` = '$jana'";
		$run = mysqli_query($con,$insert); 

		if($run == TRUE)
		{
			?>
			 <script>alert("password changed");</script>
			 <?php
		}
	}
	else {
		// Issue with passwords matching
		echo "Password did not matched";
	}
}

?>

