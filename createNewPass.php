<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <?php
						$selector = $_GET["selector"];
						$selector = $_GET["validator"];

						if (empty($selector) || empty($validator)){
							echo "Could not validate your request!";
						} else {
							if( ctype_xdigit($selector) !== false && ctype_xdigit(&validator) !== false){
								?>
								
								<form action="includes/resetPassword.inc.php" method="post">
									<input type="hidden" name="selector" value="<?php echo $selector; ?>">
									<input type="hidden" name="validator" value="<?php echo $validator; ?>">
									<input type="password" name"pwd" placeholder="Enter a new password..">
									<input type="password" name"pwd-repeat" placeholder="Repeat new password..">
									<button type"submit" name="reset-password">Reset password</button>
								</form>
							}
						}
					
				   ?>
               </div>
           </div>
       </section>

<?php
	require "footer.php";
?>