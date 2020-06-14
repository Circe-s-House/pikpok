<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Pik Pok</title>
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
            integrity="sha384fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/styles.css">
		
	</head>
	<body>
		<header>
			<div class="top-nav">
				<h1>Pik-Pok</h1>
				<?php
				if(stripos($_SERVER['REQUEST_URI'],'home.php') || (stripos($_SERVER['REQUEST_URI'],'profile.php'))){
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
				
				?>
			</div>
			
		</header>
		
		
