<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Change Name</h1>
				   <?php
						if(isset($_GET['error'])){
							if($_GET["error"] == "emptyfields"){
								echo '<p class="signuperror">Fill in all fields!</p>';
							}
						}
						else if(isset($_GET['namechange'])){
							echo '<p class="signupsuccess">You successfuly changed your name!</p>';
						}
					?>
                    <form class="changename" action="includes/changename.inc.php" method="post">
                       <input type="text" name="fname" placeholder="First name..."><br><br>
                       <input type="text" name="lname" placeholder="Last name..."><br><br>         
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