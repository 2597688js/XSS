
<!DOCTYPE HTML>
<html>
<head>
	<title>Stored XSS</title>

	<link rel="stylesheet" type="text/css" href="intern.css">
</head>
<body>
	
	<h1 align="center">Vulnerability: Stored Cross Site Scripting (XSS)</h1>

	<a href="admindash.php">Back</a>

	<div class="showLeft">
		<a href="csrf.php">CSRF</a>
		<div class="logout">
		<a href="logout.php">Logout</a>
		</div>
	</div>

	<div align="center" style="margin-top:15%;">

		<form method="get" name="guestform" action="xss_s.php">
			<table width="550" border="0" cellpadding="2" cellspacing="1">
				<tr>
					<td width="100">Name *</td>
					<td><input name="txtName" type="text" size="30" maxlength="10" style="background-color:#f2f2f2"></td>
				</tr>
				<tr>
					<td width="100">Message *</td>
					<td><textarea name="mtxMessage" cols="50" rows="3" maxlength="50" style="background-color:#f2f2f2"></textarea></td>
				</tr>
				<tr>
					<td width="100">&nbsp;</td>
					<td>
						<input name="btnSign" type="submit" value="Sign Guestbook"/>
						<input name="btnClear" type="submit" value="Clear Guestbook"/>
					</td>
				</tr>
			</table>
	
		</form>

		
	</div>	
		
	</body>
	

</html>

<?php 
	include('dbconn.php');
	
	if (array_key_exists ("btnClear", $_GET)) {
		global $con;
		$qy  = "TRUNCATE TABLE `guestbook`";
		$res = mysqli_query($con,  $qy ); 
		if ($res == TRUE)
			echo "guestbook cleared";
	}

	if(isset($_GET['btnSign']))
	{
		$name = $_GET['txtName'] ;
		$comment = $_GET['mtxMessage'] ;
	
		include('dbconn.php');
	
		//Update Database
		$query = "INSERT INTO `guestbook`(`comment`, `name`) VALUES ('$comment','$name')";
		$run = mysqli_query($con,$query);

				//Reflected XSS
				/*$last_id = mysqli_insert_id($con);
				$qry = "SELECT `comment`, `name` FROM `guestbook` WHERE `comment_id`=$last_id";
			
				$sql = mysqli_query($con,$qry); 
			
				if($sql == TRUE)
					
						$data=mysqli_fetch_assoc($sql);
						print_r($data); 
				else
						echo "Error"; */

	}

		showGuestbook();

		function showGuestbook(){
				global $con;

			$qry = "SELECT `comment`, `name` FROM `guestbook`";
			$sql=mysqli_query($con, $qry); 
	
			if($sql == TRUE){
				$data=mysqli_fetch_assoc($sql);
				while($data=mysqli_fetch_assoc($sql)){
					//echo "<pre>";
					//print_r($data);
				?>
					<table id="xssData"> 
						<tr>
							<th>Name:</th><td><?php echo $data['name'];  ?></td>

							<th>Comment:</th><td><?php echo $data['comment'];  ?></td>
					<!--<th>Comment:</th><td><?php echo htmlspecialchars($data['comment']);  ?></td>  -->
						</tr>
					</table>
				<?php
				}
			}
			else{
				echo "Error !";
			} 
		}
		
	
?>
