<?php
	require "header.php";
?>

<main>
	<!--
	<div class="container">
		
		<div class="header-login">
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				/*php tag
					if(isset($_SESSION['userId'])){
						echo '<form action="includes/logout.inc.php" method="post">					
							<button type="submit" name="logout-dubmit">Logout</button>
							</form>';
					}
					else{
						echo '<form action="includes/login.inc.php" method="post">
							<input type="text" name="mailuid" placeholder="Username/E-mail...">
							<input type="password" name="pwd" placeholder="Password...">
							<button type="submit" name="login-submit">Login</button>
							</form>
							<a href="signup.php">Signup</a>';
					}*/
				telos php tag
		</div>
		
		<div class="wrapper-main">
			<section class="section-default">
			/*εδω εχει php tag
				if(isset($_SESSION['userId'])){
					echo '<p>You are logged in!</p>';
				}
				else{
					echo '<p>You are logged out!</p>';
				}*/
			telos php tag
			</section>
		</div> -->

		<section>
			<div class="section-heading">
			<br><br><br><br><br><br><br><br><br><br><br>
				<h1>Gallery</h1>
				<div class="container">
					<?php
						include_once 'includes/dbh.inc.php';

						$sql = "SELECT * FROM photos ORDER BY likesPhotos DESC";
						$stmt = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt, $sql)){
							echo 'SQL statement failed!';
						} else {
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);

							while($row = mysqli_fetch_assoc($result)) {
								echo '<a href = "#">
									<div style="background-image: url(image/'.$row["imgFullnamePhotos"].');"></div>
									<img src="image/'.$row["imgFullnamePhotos"].'"jpg"></img>
									<h2>'.$row["descPhotos"].'</h2>
									<p></p>
									</a>';
							}
						}	
					?>
				</div>
			</div>
		</section>		

	<!--</div>-->
</main>
	
	
<?php
	require "footer.php";
?>