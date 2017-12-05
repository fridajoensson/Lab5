<?php include("sessionHijacking.php"); ?>

<!-- php code for finding account in database -->
<?php

@ $db = new mysqli('localhost', 'root', 'root', 'library');

if(isset($_POST['username'], $_POST['userpass'])) {


    $uname = mysqli_real_escape_string($db, $_POST['username']); //makes the typed value to a stringp, rotect from *'OR 1=1 (SQL injection)
    $uname = htmlentities($uname); //xxs, protects input from coding (XSS enables attackers to inject client-side script into Web pages viewed by other users.)
    $upass = sha1 ($_POST['userpass']); //hash the password so it is not displayed in the database

    $upass = htmlentities($upass); //xxs, protects input from coding
    

    // echo $uname;
    // echo '</br>';
    // echo $upass;

    $query = ("SELECT * FROM login WHERE username ='{$uname}' "." AND userpass ='{$upass}'");

    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();

    $totalcount = $stmt->num_rows();

}

?>

<!DOCTYPE html>
<html>
	<body>
		<?php include("header.php"); ?>

		<div id="content">
	 		<form method="POST" action="gallery.php">
	            <input type="text" name="username" placeholder="Username">
	            <input type="password" name="userpass" placeholder="Password">
	            <input type="submit" value="Go">

	            <!-- code for right or wrong password -->
				<?php 
				if(isset($totalcount)){
					if($totalcount == 0) {
						echo "Wrong password!";
					} else {
						echo '<meta http-equiv="refresh" content="0; URL=fileUpload.php">';
						echo "Welcom, here is the link:";
						// echo "<a href = "...;
					}
				}
				?>
	        </form>
			<div id="gallerycontent">


				<!-- code for gallery -->
				<?php

				//https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them

				//the code for creating a simple gallery is inspired by the link above

				$files = glob("uploadedfiles/*.*");

				for ($i=0; $i<count($files); $i++) {
		    		$image = $files[$i];
		    		echo '<img src="'.$image .'" alt="Random image" class="imagebox" />'."<br /><br />";
				}

	?>	
			</div>
		</div>

		<?php include("footer.php"); ?>
	</body>
</html>