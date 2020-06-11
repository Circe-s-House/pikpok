<?php
	require "header.php";
?>
		
		<section class="section-default">
			<div class="container">
				<div class="section-heading">
					<h1>Sign-up</h1>
				</div>
				<div class="signupp">
					<?php
						if(isset($_GET['error'])){
							if($_GET["error"] == "emptyfields"){
								echo '<p class="signuperror">Fill in all fields!</p>';
							}
							else if($_GET["error"] == "invaliduidmail"){
								echo '<p class="signuperror">Invalid username and e-mail!</p>';
							}
							else if($_GET["error"] == "invaliduid"){
								echo '<p class="signuperror">Invalid username!</p>';
							}
							else if($_GET["error"] == "invalidmail"){
								echo '<p class="signuperror">Invalid email!</p>';
							}
							else if($_GET["error"] == "passwordcheck"){
								echo '<p class="signuperror">Your passwords do not match!</p>';
							}
							else if($_GET["error"] == "usertaken"){
								echo '<p class="signuperror">Username is already taken!</p>';
							}
						}
						else if($_GET["signup"] == "success"){
							echo '<p class="signupsuccess">Signup successful!</p>';
						}
					?>
					<form class="form-signup" action="includes/signup.inc.php" method="post">
						<input type="text" name="uid" placeholder="Username">
						<input type="text" name="fname" placeholder="Name">
						<input type="text" name="lname" placeholder="Surname">
						<input type="text" name="mail" placeholder="E-mail">
						<input type="password" name="pwd" placeholder="Password">
						<input type="password" name="pwd-repeat" placeholder="Repeat password">	<br>					
						<input type="radio" id="male" name="gender" value="male">
						<label for="male">Male</label><br>
						<input type="radio" id="female" name="gender" value="female">
						<label for="female">Female</label><br>
						<input type="radio" id="other" name="gender" value="other">
						<label for="other">Other</label><br>
						<input type="date" name="birthday" placeholder="Date of Birth"><br>
						<button type="submit" name="signup-submit">Signup</button>
					</form>	
				</div>
			</div>
		</section>			
	
	
<?php
	require "footer.php";
?>