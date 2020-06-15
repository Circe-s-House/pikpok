<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Login</h1>
				 
                    <form class="form-login" action="includes/login.inc.php" method="post">
                       <input type="text" name="mailuid" placeholder="Username/E-mail..."><br><br>
                       <input type="password" name="pwd" placeholder="Password..."><br><br>
                       <input type="checkbox" name="remember"> Keep me loged in</input><br>
					   <?php
						if(isset($GET["newpwd"])){
							if($_GET["newpwd"] == "passwordupdated"){
								echo '<p class="signupsuccess">Your password has been reset!</p>';
							}
						}
					   ?>
                       <button type="submit" name="login-submit">Login</button> 
                    </form>
                    <form method="get" action="signup.php">
                        <button type="submit" name="signup">Sign up</button>
                    </form>  
					<a href= "resetPassword.php">Forgot my password!</a>
               </div>
           </div>
       </section>

<?php
	require "footer.php";
?>