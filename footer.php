	<footer class="copyright">
		<?php
			if(stripos($_SERVER['REQUEST_URI'],'home.php')){
				echo '<form method="get" action="upload.php">
						<button id="add" type="submit">
						<i class="fas fa-plus"></i>
						</button></form>
						<button id="up">
							<i class="fas fa-chevron-up"></i>
						</button>';
				}
		?>
		
		<p>Copyright &copy; Team fuck the police 2020</p>
		
	</footer>

	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script src="scripts/scripts.js"></script>
</html>