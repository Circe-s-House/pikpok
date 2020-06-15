<?php

	if(isset($_POST['delpic'])){

		require 'dbh.inc.php';
		session_start();
		
		$sql = "DELETE FROM photos WHERE imgFullnamePhotos = ?;";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "SQL  statement failed!";
		} 
		else{ 
			mysqli_stmt_bind_param($stmt, "s", $_SESSION['photo']);
			mysqli_stmt_execute($stmt);

			header("Location: ../profile.php?delete=success");
		}
	}

			