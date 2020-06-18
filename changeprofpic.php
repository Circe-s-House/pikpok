<?php
	require "header.php";
?>
<?php
	if(isset($_SESSION['userId'])){
?>
       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Change</h1>
				   <h1>Photo Profile</h1>
				   <?php
						if(isset($_GET['error'])){
							if($_GET["error"] == "sizebig"){
								echo '<p class="signuperror">File size is too big!</p>';
							}
							else if($_GET["error"] == "smth"){
								echo '<p class="signuperror">You had an error!</p>';
							}
							else if($_GET["error"] == "wrtype"){
								echo '<p class="signuperror">You need to upload a proper file type!</p>';
							}
						}
						else if(isset($_GET['upload'])){
							echo '<p class="signupsuccess">You successfuly changed your profile picture!</p>';
						}
					?>
                       <form action="includes/changeprofpic.inc.php" method="post" enctype="multipart/form-data">
							<input type="file" name="file"><br>
							<button type="submit" name="submit"> Change Profile Picture </button>
						</form>        
                    <form method="get" action="profile.php">
                        <button type="submit" name="goback">Go Back</button>
                    </form>       
               </div>
           </div>
       </section>
<?php
	}
	else{
		header("Location: index.php");
		exit();	
	}
?>	
<?php
	require "footer.php";
?>