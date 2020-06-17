<?php
	require "header.php";
?>

	<section>
		<div class="container-profile">
			<?php
				require 'includes/dbh.inc.php';
			?>	
				<aside class="prfile-info">
				<?php
				if(isset($_SESSION['userId'])){
					$userUID = $_SESSION['userId'];
					$sql = "SELECT nameUsers, lnameUsers, profPic FROM users WHERE idUsers= $userUID;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck>0){
						while ($row = mysqli_fetch_assoc($result)){
							echo '<div class="help">';
							echo '<a href = "#">
							<div style="background-image: url(profpics/'.$row['profPic'].');"></div>
							<img src="profpics/'.$row['profPic'].'"jpg"></img>
							</a>';
							echo '</div>';
							echo '<p>Name: ';
							echo $row['nameUsers'];
							echo "<br>";
							echo 'Last Name: ';
							echo $row['lnameUsers'];
							echo "</p>";
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
					?>
					</aside>
					<div class="photos-general">
					<?php
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
							echo '<div class="under-photo">
								<div style="background-image: url(image/'.$row["imgFullnamePhotos"].');"></div>
								<img src="image/'.$row["imgFullnamePhotos"].'"jpg"></img>
								<p>'.$row["descPhotos"].'</p>
								<form action="includes/delpic.inc.php" method="post">	
								<button type="submit" value = "'.$row["idPhotos"].'" name="delpic">Delete photo</button>
								</form>
								</div>';
							
						}
					}
					?>
					</div>
			<?php
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

	</section>
	
<script src="scripts/dropdownbutton.js"></script>	
<script src="scripts/delpic.js"></script>
	s
<?php
	require "footer.php";
?>