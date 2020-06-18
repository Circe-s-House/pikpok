<?php
if (isset($_POST['commbutton'])){
	
	require 'dbh.inc.php';
	session_start();
	
	$photoid = $_POST['commbutton'];
	$comm = $_POST['commid'];
	
	date_default_timezone_set('Europe/Athens');
	$today = date("Y-m-d H:i:s"); 
	
	$sql = "INSERT INTO comments (idUsers, idPhoto, comment, commdate) VALUES (?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../home.php?error=sqlerror");
		exit();
	}
	else{					
		mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['userId'], $photoid, $comm, $today);
		mysqli_stmt_execute($stmt);
					
		header("Location: ../home.php?comment=success");
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		exit();	
	}					
}

