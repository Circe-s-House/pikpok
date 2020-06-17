<?php

	if(isset($_POST['like'])){

		require 'dbh.inc.php';
		session_start();
		$likes = $_POST['like'];
		
		
		$sql = "SELECT * FROM likes WHERE idUsers = ".$_SESSION['userId'].";";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "SQL  statement failed!";
		} 
		else{ 
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$check = mysqli_fetch_assoc($result);
			if(!$check){
		
				$sql = "INSERT INTO likes (idUsers, idPhoto) VALUES (?, ?)";
				$stmt = mysqli_stmt_init($conn);
			
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "SQL  statement failed!";
				} 
				else{ 
					mysqli_stmt_bind_param($stmt, "ss", $_SESSION['userId'], $likes);
					mysqli_stmt_execute($stmt);
					
				}
				
				$sql = "SELECT * FROM photos WHERE idPhotos = $likes;";
				$stmt = mysqli_stmt_init($conn);
			
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "SQL  statement failed!";
				} 
				else{ 
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);
					
					$likesnum = $row["likesPhotos"];
					$likesnum = $likesnum +1;
					
					$sql = "UPDATE photos SET likesPhotos = ? WHERE idPhotos = $likes;";
					$stmt = mysqli_stmt_init($conn);
					
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL  statement failed!";
					} 
					else{ 
						mysqli_stmt_bind_param($stmt, "s", $likesnum);
						mysqli_stmt_execute($stmt);
					
						header("Location: ../home.php?like=success");
						exit();	
					}
				}
			}
			else{
				$sql = "DELETE FROM likes WHERE idUsers = ".$_SESSION['userId']." AND idPhoto = $likes; ";
				$stmt = mysqli_stmt_init($conn);
			
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "SQL  statement failed!";
				} 
				else{ 
					mysqli_stmt_execute($stmt);
					
				}
				
				$sql = "SELECT * FROM photos WHERE idPhotos = $likes;";
				$stmt = mysqli_stmt_init($conn);
			
				if(!mysqli_stmt_prepare($stmt, $sql)){
					echo "SQL  statement failed!";
				} 
				else{ 
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);
					
					$likesnum = $row["likesPhotos"];
					$likesnum = $likesnum - 1;
					
					$sql = "UPDATE photos SET likesPhotos = ? WHERE idPhotos = $likes;";
					$stmt = mysqli_stmt_init($conn);
					
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL  statement failed!";
					} 
					else{ 
						mysqli_stmt_bind_param($stmt, "s", $likesnum);
						mysqli_stmt_execute($stmt);
					
						header("Location: ../home.php?likerem=success");
						exit();	
					}
				}
			}	
		}
	}			