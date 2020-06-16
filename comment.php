<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Comment</h1>
					<?php
						if(isset($_GET['signup'])){
							echo '<p class="signupsuccess">Signup successful!</p>';
						}
					?>
                    <form class="form-login" action="includes/upcomment.inc.php" method="post">
                       <input type="text" name="commid" placeholder="Comment..."><br><br>
                       <button type="submit" name="login-submit">Enter</button> 
                    </form>
               </div>
           </div>
       </section>

<?php
	require "footer.php";
?>