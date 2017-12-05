<?php 

if(isset($_FILES['upload'])){

  $allowedextensions = array ('jpeg', 'gif', 'png', 'jpg');

  $extension = strtolower(substr($_FILES['upload']['name'], strpos($_FILES['upload']['name'], '.') +1));

  echo $extension;

  $error = array ();

  if (in_array($extension, $allowedextensions) === false) {
    $error[] = "Extension not allowed, thses are the allowed ones...";


  }

  if($_FILES['upload']['size']>10000000) {

    $error[] = "The file size is too big, we allow a maximum of 10mb";

  }

  if (empty($error)) {

    move_uploaded_file($_FILES['upload']['tmp_name'], "uploadedfiles/{$_FILES['upload']['name']}");

  } 




}

?>

<html>
  <head>
    <title>Security - Upload</title>
  </head>

  <body>

  <?php

  if(isset($error)) {
    if (empty($error)) {
      echo '<a href="uploadedfiles/'.$_FILES['upload']['name'].'">This is your file';
    }
    else {
    foreach($error as $err) {
      echo $err;
      echo '</br>';
    }
  }
  } 

  ?>


    <div>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload" /></br>
        <input  type="submit" value="submit" />
      </form>
      <a href="gallery.php"> Back to Gallery </a>
    </div>
  </body>
</html>