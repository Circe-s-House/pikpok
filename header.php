<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>SocialHub</title>
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
            integrity="sha384fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/styles.css">
		
	</head>
	<body>
		<header>
			<div class="top-nav">
				<a href = home.php><h1>Social Hub</h1></a>
				<?php
				require 'includes/dbh.inc.php';
				if(stripos($_SERVER['REQUEST_URI'],'home.php')){
					echo '<div class="inputsearch">
					<input type="text" name="search" placeholder="Search..">
					</div>
					<a href = home.likes.php><i class="fas fa-heart"></i></a>';
				}
				else if(stripos($_SERVER['REQUEST_URI'],'home.likes.php')){
					echo '<div class="inputsearch">
					<input type="text" name="search" placeholder="Search..">
					</div>
					<a href = home.php><i class="fas fa-clock"></i></a>';
				}
				else if(stripos($_SERVER['REQUEST_URI'],'profile.php')){
					echo '<div class="inputsearch">
					<input type="text" name="search" placeholder="Search..">
					</div>
					<a href = profile.likes.php><i class="fas fa-heart"></i></a>';
				}
				else if(stripos($_SERVER['REQUEST_URI'],'profile.likes.php')){
					echo '<div class="inputsearch">
					<input type="text" name="search" placeholder="Search..">
					</div>
					<a href = profile.php><i class="fas fa-clock"></i></a>';
				}
				
				if(isset($_SESSION['userId'])){
					
					$userUID = $_SESSION['userId'];
					$sql = "SELECT profPic FROM users WHERE idUsers= $userUID;";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck>0){
						while ($row = mysqli_fetch_assoc($result)){
							echo '<div class="help">';
							echo '<a href = profile.php>
							<div style="background-image: url(profpics/'.$row['profPic'].');"></div>
							<img src="profpics/'.$row['profPic'].'"jpg"></img>
							<p></p>
							</a>';
							echo '</div>';
						}
					}
					else{
						echo '<a href = profile.php><i class="fas fa-user"></i></a>';
					}
					echo '<form action="includes/logout.inc.php" method="post">					
							<button type="submit" name="logout-dubmit">Logout</button>
							</form>';
				} 
				else{
					echo '<a href = index.php><i class="fas fa-user"></i></a>';
				}
				?>
			</div>
			
		</header>
		
		
