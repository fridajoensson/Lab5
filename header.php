<head>
	<title>My page</title>
		<meta name="description" content="describes page"/>
		<meta charset="utf-8" /> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
		<?php include("config.php"); ?>
</head>

		<header>
			<div id="mainmenu">
				<ul id ="mainmenuul">
					<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a></li>
			 		<li><a class="<?php echo ($current_page == 'aboutus.php') ? 'active' : NULL ?>" href="aboutus.php">About Us</a></li>
					<li><a class="<?php echo ($current_page == 'browsebooks.php') ? 'active' : NULL ?>" href="browsebooks.php">Browse Books</a></li>
					<li><a class="<?php echo ($current_page == 'mybooks.php' ) ? 'active' : NULL ?>" href="mybooks.php">My Books</a></li>
					<li><a class="<?php echo ($current_page == 'gallery.php')? 'active': NULL ?>" href="gallery.php">Gallery</a></li>
					<li><a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a></li>
				</ul>
			</div>
		</header>