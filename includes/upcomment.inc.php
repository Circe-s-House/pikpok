<?php
if (isset($_POST['commbutton'])){
	
	require 'dbh.inc.php';
	session_start();
	
	$photoid = $_POST['commbutton'];
	$comm = $_POST['commid'];
	
	$sql = "SELECT * FROM comments;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL statement failed!";
	} 
	else {
		if (empty($comm)){
			header("Location: ../home.php?error=emptyfields");
			exit();
		}
		else{	
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$rowCount = mysqli_num_rows($result);
			$setCommentOrder = $rowCount + 1;
		
			$sql = "INSERT INTO comments (idUsers, idPhotos, comment, ordercomm) VALUES (?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../home.php?error=sqlerror");
				exit();
			}
			else{					
				mysqli_stmt_bind_param($stmt, "sss", $_SESSION['userId'], $photoid, $comm, $setCommentOrder);
				mysqli_stmt_execute($stmt);
							
				header("Location: ../home.php?namechange=success");
				mysqli_stmt_close($stmt);
				mysqli_close($conn);
				exit();	
			}					
	}
				
}

