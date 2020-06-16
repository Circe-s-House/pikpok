<?php
	require "header.php";
?>

	<main>
		<div class="grid-container">
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<?php
				require 'includes/dbh.inc.php';
				if(isset($_SESSION['userId'])){
					$userUID = $_SESSION['userId'];
					$sql = "SELECT nameUsers, lnameUsers, bdate, genderUser, emailUsers, profPic FROM users WHERE idUsers= $userUID;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck>0){
						while ($row = mysqli_fetch_assoc($result)){
							echo '<div class="help">';
							echo '<a href = "#">
							<div style="background-image: url(profpics/'.$row['profPic'].');"></div>
							<img src="profpics/'.$row['profPic'].'"jpg"></img>
							<p></p>
							</a>';
							echo '</div>';
							echo 'Name: ';
							echo $row['nameUsers'];
							echo "\n";
							echo 'Last Name: ';
							echo $row['lnameUsers'];
							echo "\n";
							echo 'Birth Date: ';
							echo $row['bdate'];
							echo "\n";
							echo 'Gender: ';
							echo $row['genderUser'];
							echo "\n";
							echo 'Email: ';
							echo $row['emailUsers'];
							echo "\n";
							echo '<div class="dropdown">
								  <button type = "submit" onclick="myFunction()" class="dropbtn">Settings</button>
								  <div id="myDropdown" class="dropdown-content">
									<a href="changeprofpic.php">Change profile photo</a>
									<a href="changename.php">Change name</a>
									<a href="changepwd.php">Change your password</a>
								  </div>
								  </div>';	
						}
					}
					$sql = "SELECT * FROM photos WHERE idUsers= $userUID ORDER BY orderPhotos DESC";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
						echo 'SQL statement failed!';
					} 
					else {
						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);

						while($row = mysqli_fetch_assoc($result)) {
							$_SESSION['photo'] = $row["imgFullnamePhotos"];
							echo '<a href = "#">
							<div style="background-image: url(image/'.$row["imgFullnamePhotos"].');"></div>
							<img src="image/'.$row["imgFullnamePhotos"].'"jpg"></img>
							<h2>'.$row["descPhotos"].'</h2>
							<p></p>
							</a>';
							echo '<form action="includes/delpic.inc.php" method="post">	
							<button type="submit" value = "'.$row["idPhotos"].'" name="delpic">Delete photo</button>
							</form>';
							
						}
					}			
				}
				else{
					echo 'You are not logged in!';
					echo '<form method="get" action="index.php">
                      <button type="submit" name="goback">Go Back</button>
					  </form> ';
				}
			?>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</main>
	
<script src="scripts/dropdownbutton.js"></script>	
<script src="scripts/delpic.js"></script>	
<?php
	require "footer.php";
?>