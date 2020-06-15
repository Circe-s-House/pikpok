<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Change</h1>
				   <h1>Photo Profile</h1>
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
	require "footer.php";
?>