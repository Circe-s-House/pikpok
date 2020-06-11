<?php
	require "header.php";
?>

	<main>
		<div class="landing-text">
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<?php
			require 'includes/dbh.inc.php';
			if(isset($_SESSION['userId'])){
				$userUID = $_SESSION['userId'];
				$sql = "SELECT nameUsers, lnameUsers, bdate, genderUser, emailUsers FROM users WHERE idUsers= $userUID;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck>0){
					while ($row = mysqli_fetch_assoc($result)){
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
					}
				}			
			}
			else{
				echo 'You are not logged in!';
			}
		?>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</main>
	
	
<?php
	require "footer.php";
?>