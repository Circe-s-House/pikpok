<?php
	require "header.php";
?>

       <section>
           <div class="container">
               <div class="landing-text">
                   <h1>Change Name</h1>
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