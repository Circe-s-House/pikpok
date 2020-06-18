	
	</body>
	<footer class="copyright">
		<?php
			require 'includes/dbh.inc.php';
			if(isset($_SESSION['userId']) && (stripos($_SERVER['REQUEST_URI'],'home.php') || stripos($_SERVER['REQUEST_URI'],'profile.php') || stripos($_SERVER['REQUEST_URI'],'profile.likes.php') || stripos($_SERVER['REQUEST_URI'],'home.likes.php'))){
				echo '<form method="get" action="upload.php">
						<button id="add" type="submit">
						<i class="fas fa-plus"></i>
						</button>
						</form>';
			}
			if(stripos($_SERVER['REQUEST_URI'],'home.php') || stripos($_SERVER['REQUEST_URI'],'profile.php') || stripos($_SERVER['REQUEST_URI'],'profile.likes.php') || stripos($_SERVER['REQUEST_URI'],'home.likes.php')){
				echo '<button id="up">
						<i class="fas fa-chevron-up"></i>
					</button>';
				}
		?>
		
		<p>Copyright &copy; SocialHub team 2020</p>
		
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script src="scripts/scripts.js"></script>
</html>