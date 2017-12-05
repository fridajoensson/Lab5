<!DOCTYPE html>
<html>
	<head>
		<title>My page</title>
		<meta name="description" content="describes page"/>
		<meta charset="utf-8" /> 
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
	</head>
	<body>
		<?php include("header.php"); ?>
		
		<div id="contactContent">
			<form id ="contactForm">
				<h1>Do you have a question?</h1>
				<h2>Fill in the form and we'll send you an email</h2>
				<label>Name</label>
				<input placeholder="First and Lastname" type="text">

				<label>E-mail</label>
				<input placeholder="your.name@email.com" type="text">
				 
				 <label >Question</label>
				 <textarea placeholder="Write something.." style="height:200px"></textarea>

				 <input type="submit" value="Submit">
			</form>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>