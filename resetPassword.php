<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Reset your password</h1>
					<p>An e-mail will be sent to you with instructions on how to reset your password!</p>
					<form action="resetPassword.inc.php" method="post">
                        <input type="text" name="email" placeholder="Enter your e-mail">    
						<button type="submit" name="reset-password">Receive new password</button>
					</form>
					<?php
					if (isset($_GET["reset"])) {
						if ($_GET["reset"] == "success"){
							echo '<p class="signupsuccess">Check your e-mail!</p>';
						}
					}
					?>
               </div>
           </div>
       </section>

<?php
	require "footer.php";
?>