<?php

	if(isset($_POST['delpic'])){

		require 'dbh.inc.php';
		session_start();
		$pid = $_POST['delpic'];
		
		$sql = "DELETE FROM photos WHERE idPhotos = ?;";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "SQL  statement failed!";
		} 
		else{ 
			mysqli_stmt_bind_param($stmt, "s", $pid);
			mysqli_stmt_execute($stmt);
			
			$sql = "DELETE FROM comments WHERE idPhoto = ?;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL  statement failed!";
			} 
			else{ 
				mysqli_stmt_bind_param($stmt, "s", $pid);
				mysqli_stmt_execute($stmt);
			}
			
			$sql = "DELETE FROM likes WHERE idPhoto = ?;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "SQL  statement failed!";
			} 
			else{ 
				mysqli_stmt_bind_param($stmt, "s", $pid);
				mysqli_stmt_execute($stmt);
			}
			header("Location: ../profile.php?delete=success");
			exit();	
		}
	}
	else{
		header("Location: index.php");
		exit();	
	}