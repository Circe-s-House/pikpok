<?php

	if(isset($_POST['submit'])){
		
		$imageDesc = $_POST['filedesc'];
		
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
					$fileDestination = ("../image/" . $imageFullName);

					include_once "dbh.inc.php";

					$sql = "SELECT * FROM photos;";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo "SQL statement failed!";
					} else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount = mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;


						$sql = "INSERT INTO photos (idUsers, descPhotos, imgFullnamePhotos, orderPhotos) VALUES (?, ?, ?, ?);";
						if(!mysqli_stmt_prepare($stmt, $sql)){
							echo "SQL  statement failed!";
						} else{ //καπου εδω προσθετουμε idUsers kai duo s katw kai duo ? panwkai likesPhotos!!!!!!!!!!
							session_start();
							mysqli_stmt_bind_param($stmt, "ssss", $_SESSION['userId'], $imageDesc, $imageFullName, $setImageOrder);
							mysqli_stmt_execute($stmt);

							if(move_uploaded_file($fileTempName, $fileDestination)){
								echo "muf success";
							}

							header("Location: ../home.php?upload=success");
						}

					}
				
				} else {
					echo "File size is too big!";
					exit();
				}				
			} else {
				echo "You had an error!";
				exit();
			}
		} else {
			echo "You need to upload a proper file type!";
			exit();
		}
	}
