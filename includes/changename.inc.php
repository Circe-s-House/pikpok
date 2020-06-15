<?php
if (isset($_POST['submit'])){
	
	require 'dbh.inc.php';
	session_start();
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
		
	if (empty($fname) || empty($lname)){
		header("Location: ../changename.php?error=emptyfields");
		exit();
	}
	else{			
		$sql = "UPDATE users SET nameUsers = ?, lnameUsers = ? WHERE idUsers = {$_SESSION['userId']};";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../changename.php?error=sqlerror");
			exit();
		}
		else{
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						
			mysqli_stmt_bind_param($stmt, "ss", $fname, $lname);
			mysqli_stmt_execute($stmt);
						
			header("Location: ../changename.php?namechange=success");
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
			exit();	
		}
						
	}
				
}
