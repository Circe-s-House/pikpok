<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Change Password</h1>
				   <?php
						if(isset($_GET['error'])){
							if($_GET["error"] == "emptyfields"){
								echo '<p class="signuperror">Fill in all fields!</p>';
							}
							else if($_GET["error"] == "passwordcheck"){
								echo '<p class="signuperror">Your passwords do not match!</p>';
							}
						}
						else if(isset($_GET['pwdchange'])){
							echo '<p class="signupsuccess">You successfuly changed your password!</p>';
						}
					?>
                    <form class="changename" action="includes/changepwd.inc.php" method="post">
                       <input type="password" name="pwd" placeholder="Password..."><br><br>
                       <input type="password" name="reppwd" placeholder="Repeat Password..."><br><br>         
                       <button type="submit" name="submit">Submit</button> 
                    </form>
                    <form method="get" action="profile.php">
                        <button type="submit" name="goback">Go Back</button>
                    </form>       
               </div>
           </div>
       </section>

<?php
	require "footer.php";
?>