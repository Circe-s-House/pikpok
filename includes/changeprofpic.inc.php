<?php

	if(isset($_POST['submit'])){

		$file = $_FILES['file'];
		
		$fileName = $file["name"];
		$fileType = $file["type"];
		$fileTempName = $file["tmp_name"];
		$fileError = $file["error"];
		$fileSize = $file["size"];
	
		$fileExt = explode(".", $fileName);
		$fileActualExt = strtolower(end($fileExt));
		
		$allowed = array("jpg","jpeg","png");
		
		if (in_array($fileActualExt, $allowed)){
			if($fileError === 0) {
				if($fileSize < 2000000000 ) {
					$imageFullName = uniqid("", true) . "." . $fileActualExt;
					$fileDestination = ("../profpics/" . $imageFullName);

					require 'dbh.inc.php';
					session_start();

					$sql = "UPDATE users SET profPic = ? WHERE idUsers = {$_SESSION['userId']};";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL  statement failed!";
					} 
					else{ 
						mysqli_stmt_bind_param($stmt, "s", $imageFullName);
						mysqli_stmt_execute($stmt);

						if(move_uploaded_file($fileTempName, $fileDestination)){
							echo "muf success";
						}

						header("Location: ../changeprofpic.php?upload=success");
					}

				}
				else {
					header("Location: ../changeprofpic.php?error=sizebig");
					exit();	
				}				
			} 
			else {
				header("Location: ../changeprofpic.php?error=smth");
				exit();
			}
		} 
		else {
			header("Location: ../changeprofpic.php?error=wrtype");
			exit();
		}
	}