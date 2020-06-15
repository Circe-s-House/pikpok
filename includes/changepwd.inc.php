<?php
if (isset($_POST['submit'])){
	
	require 'dbh.inc.php';
	session_start();
	
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['reppwd'];
	
		
	if (empty($password) || empty($passwordRepeat)){
		header("Location: ../changepwd.php?error=emptyfields");
		exit();
	}
	else if ($password !== $passwordRepeat){
		header("Location: ../changepwd.php?error=passwordcheck");
		exit();
	}
	else{			
		$sql = "UPDATE users SET pwdUsers = ? WHERE idUsers = {$_SESSION['userId']};";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../changepwd.php?error=sqlerror");
			exit();
		}
		else{
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						
			mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
			mysqli_stmt_execute($stmt);
						
			header("Location: ../changepwd.php?pwdchange=success");
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
			exit();	
		}
						
	}
				
}
