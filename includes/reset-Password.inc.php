<?php

if (isset($_POST["reset-password"])){
	
	$selector = $_POST["selector"];
	$validator = $_POST["validator"];
	$password = $_POST["pwd"];
	$passwordRepeat = $_POST["pwd-repeat"];
	
	if (empty($password) || empty($passwordRepeat)){
		header("Location: ../createNewPass.php?newpwd=empty");
		empty();
	} else if ($password != $passwordRepeat) {
		header("Location: ../createNewPass.php?newpwd=pwdnotsame");
		exit();
	} 
	
	$curentDate = date("U");
	
	require 'dbh.inc.php';
	
	$sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
	
	$stmt = mysqli_stmt_init($conn);
		
	if(!mysqli_stmt_prepare($stmt,$sql)) {
		echo "There was an error!";
		exit();
	} else{
		mysqli_stmt_bind_param($stmt, "ss" , $selector, $curentDate);
		mysqli_stmt_execute($stmt);
		
		$result = mysqli_stmt_get_result($stmt);
		if(!$row = mysqli_fetch_assoc($result)){
			echo "You need to re-submit your reset request.";
			exit();
		} esle {
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
			
			if($tokenCheck === false){
				echo "You need to re-submit your reset request.";
				exit();
			} elseif($tokenCheck === true){
				
				$tokenEmail = $row['pwdResetEmail'];
				
				$sql = "SELECT * FROM users WHERE  emailUsers=?;";
				
				$stmt = mysqli_stmt_init($conn);
					
				if(!mysqli_stmt_prepare($stmt,$sql)) {
					echo "There was an error!";
					exit();
				} else{
					mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
					mysqli_stmt_execute($stmt);
					
					$result = mysqli_stmt_get_result($stmt);
					
					if(!$row = mysqli_fetch_assoc($result)){
						echo "There was an error";
						exit();
					} 
					else {
						$sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?";
						
						$stmt = mysqli_stmt_init($conn);
					
						if(!mysqli_stmt_prepare($stmt,$sql)) {
							echo "There was an error!";
							exit();
						} else{
							$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
							
							mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
							mysqli_stmt_execute($stmt);
							
							$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
							$stmt = mysqli_stmt_init($conn);
							if(!mysqli_stmt_prepare($stmt, $sql)){
								echo "there was an error";
								exit();
							} 
							else {
								mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
								mysqli_stmt_execute($stmt);
								header(Location: ../index.php?newpwd=passwordupdated");
							}
						}		
					}
				}
				
			}
		}
		
	}
	
	
} else{ 
	header("Location: ../index.php");
}

?>