<?php
	require "header.php";
?>

<main>
		<section>
			<div class="section-heading">
			<br><br><br><br><br><br><br><br><br><br><br>
				<h1>SocialHub</h1>
				<h2>or SocialPub? Either way grab a <i class="fas fa-beer"></i> and enjoy!</h2>
				<div class="container">
				
					<?php
						include_once 'includes/dbh.inc.php';

						$sql = "SELECT photos.*, comments.* FROM photos LEFT JOIN comments ON (photos.idPhotos = comments.idPhoto) ORDER BY date DESC, commdate DESC";
						$stmt = mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt, $sql)){
							echo 'SQL statement failed!';
						} else {
							mysqli_stmt_execute($stmt);
							$result = mysqli_stmt_get_result($stmt);
							$tmpphoto = "";
							?>
							<div class="under">
							<?php
							while($row = mysqli_fetch_assoc($result)) {
								if($tmpphoto !== $row["imgFullnamePhotos"]){
									echo '<a href = "#">
										<h2>Username: '.$_SESSION['userUid'].'</h2>
										<p>'.$row["descPhotos"].'</p>
										<div class="myimage" style="background-image: url(image/'.$row["imgFullnamePhotos"].');"></div>
										<img src="image/'.$row["imgFullnamePhotos"].'"jpg"></img>
										</a>';
										if(isset($_SESSION['userId'])){
											echo '<form action="includes/likes.inc.php" method="post">	
											 <button type="submit" value = "'.$row["idPhotos"].'" name="like">LIKE</button>
											 </form>';
										}
										echo '<p>Likes: '.$row["likesPhotos"].'</p>';
										if(isset($_SESSION['userId'])){
											echo '<form action="includes/upcomment.inc.php" method="post">	
											 <input type="text" name="commid" placeholder="Comment..."><br><br>
											 <button type="submit" value = "'.$row["idPhotos"].'" name="commbutton">Comment</button>
											 </form>';
										}
								}

									
									echo '<p>'.$row["comment"].'</p>';

								$tmpphoto = $row["imgFullnamePhotos"];
							}
							?>
							</div>
							<?php
						}	
					?>	
				</div>
			</div>
		</section>
<br><br><br><br><br>	
</main>
	
	
<?php
	require "footer.php";
?>
