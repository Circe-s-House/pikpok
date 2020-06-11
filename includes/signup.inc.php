<?php
if (isset($_POST['signup-submit'])){
	
	require 'dbh.inc.php';
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$bday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	
	if (empty($gender) || empty($bday) || empty($lname) || empty($fname) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email."&fname=".$fname."&lname=".$lname."&birthday=".$bday."&gender=".$gender);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?error=invalidmailuid&fname=".$fname."&lname=".$lname."&birthday=".$bday."&gender=".$gender);
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidmail&uid=".$username."&fname=".$fname."&lname=".$lname."&birthday=".$bday."&gender=".$gender);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?error=invaliduid&mail=".$email."&fname=".$fname."&lname=".$lname."&birthday=".$bday."&gender=".$gender);
		exit();
	}
	else if ($password !== $passwordRepeat){
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email."&fname=".$fname."&lname=".$lname."&birthday=".$bday."&gender=".$gender);
		exit();
	}
	else{
		
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0){
				header("Location: ../signup.php?error=usertaken&mail=".$email."&fname=".$fname."&lname=".$lname."&birthday=".$bday."&gender=".$gender);
				exit();	
			}
			else {
				
				$sql = "INSERT INTO users (nameUsers, lnameUsers, bdate, genderUser, uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../signup.php?error=sqlerror");
				exit();
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					
					mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $bday, $gender, $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../index.php?signup=success");
					exit();	
				}
				
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();
}