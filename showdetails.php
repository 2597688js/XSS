<!DOCTYPE HTML>
<html>
<head>
	<title>Show Details</title>

	<link rel="stylesheet" type="text/css" href="intern.css">
</head>
<body>
	<div class="showLeft">
		<a href="admindash.php">Attacks</a>
		<div class="logout">
		<a href="logout.php">Logout</a>
		</div>
	</div>
	
</body>


</html>


<?php

	session_start();

	$name = $_GET['uname'];
	//echo $name;
	$_SESSION['usr'] = $name;
	//echo $_SESSION['usr'];

		if(isset($_GET['submit']))
	{
		
		
		$username= $_GET['uname'];
		$pass= $_GET['pwd'];
		
		include('dbconn.php');
		
		
		function showdetails($username,$pass)
		
		{
			include('dbconn.php');
			
			
			$sql = "SELECT `name`, `account no`, `balance` FROM `balance` WHERE `name`='$username' AND `password`='$pass'";
			$run=mysqli_query($con,$sql);
		
			if(mysqli_num_rows($run)>0)
			{
				$data=mysqli_fetch_assoc($run);
				?>
				<div class="showRight">
					<table id="showDetails" align="center">
						<tr>
							<th colspan="3"><b>User details</b></th>
						</tr>
						<tr>
							<th>Name</th>
							<td><?php echo $data['name'];  ?></td>
						</tr>
						<tr>
							<th>Balance</th>
							<td><?php echo $data['balance'];  ?></td>
						</tr>
						<tr>
							<th>Account no</th>
							<td><?php echo $data['account no'];  ?></td>
						</tr>
					</table>
				</div>
				
				<?php
			}
			else
			{
				?> 
					<script>
						alert("Username or password not match !!");
						window.open('index.php','_self'); 
					</script>

				<?php
			}
		}
		showdetails($username,$pass);
		//header('location:admindash.php');
		

	}
  
?>