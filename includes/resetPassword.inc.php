<?php

	if (isset($_POST["reset-password"])){
		
		$selector = bin2hex(random_bytes(8));
		$token = random_bytes(16);
		
		$url = "http://localhost/pikpok/resetPassword/createNewPass.php?selector=" . $selector . "&validator=" . bin2hex($token);
		
		
		$expires= date("U") + 1800;
		
		require 'dbh.inc.php';
		
		$userEmail= $_POST["email"];
		
		$sql = "DELETE FROM passwordreset WHERE passwordResetEmail=?;";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			echo "There was an error!";
			exit();
		} else{
			mysqli_stmt_bind_param($stmt, "s" , $userEmail);
			mysqli_stmt_execute($stmt);
		}
		$sql = "INSERT INTO passwordreset (passwordResetEmail, passwordResetSelector, passwordResetToken, passwordResetExpires) VALUES (?, ?, ?, ?);";
		
		
		
		$stmt = mysqli_stmt_init($conn);
		
		
		if(!mysqli_stmt_prepare($stmt,$sql)) {
			echo "There was an error!";
			exit();
		} else{
			$hashedToken= password_hash($token, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "ssss" , $userEmail, $selector, $hashedToken, $expires);
			mysqli_stmt_execute($stmt);
		}
		
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
		$to= $userEmail;
		
		$subject = 'Reset your password for SocialHub';
		$message = '<p> klik da link </br> <a href="' . $url . '">' . $url . '</a> </p>';
		
		$headers = "From: SocialHub <dit16075@uop.gr>\r\n"; 
		$headers .= "Reply-To:  <dit16075@uop.gr>\r\n"; 
		$headers .= "Content-type: text/html\r\n";

		mail($to, $subject, $message, $headers);
		
		header("Location: ../resetPassword.php?reset=success");
		
		
	}else {
		header("Location: ../index.php")
	}