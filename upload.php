<?php
	require "header.php";
?>
<?php
	//prepei na valoume hmeromhnia kai wra
	if(isset($_SESSION['userId'])){
		 echo '<section>
           <div class="container">
               <div class="landing-text">
                   <h1>UPLOAD</h1>
                   <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
						<input type="text" name="filedesc" placeholder="Description...">
						<input type="file" name="file"><br>
						<button type="submit" name="submit"> UPLOAD </button>
					</form>
               </div>
           </div>
       </section>';
	}
       
?>
<?php
	require "footer.php";
?>