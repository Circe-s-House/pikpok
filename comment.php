<?php
	require "header.php";
?>
<?php
	if(isset($_SESSION['userId'])){
       echo '<section>
           <div class="container">
               <div class="landing-text">
                   <h1>Comment</h1>';
					
						if(isset($_GET['signup'])){
							echo '<p class="signupsuccess">Signup successful!</p>';
						}
					
                    echo'<form class="form-login" action="includes/upcomment.inc.php" method="post">
                       <input type="text" name="commid" placeholder="Comment..."><br><br>
                       <button type="submit" name="login-submit">Enter</button> 
                    </form>
               </div>
           </div>
       </section>';
	}
	else{
		header("Location: index.php");
		exit();	
	}

?>
<?php
	require "footer.php";
?>