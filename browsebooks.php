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
        <?php
        include("config.php");
        $title = "Search books";
        include("header.php");
        ?>
        
        <div id="content">
            <div id="searchfield">
                <h1>Search</h1>
                <form action="browsebooks.php" method="POST">
                    by the title:
                    <input type="text" name="searchtitle">
                    or by the author:
                    <input type="text" name="searchauthor">
                    <input type="submit" value="Submit">
                    </form> 
            </div> <br><br><br>
            <h2>Book List</h2>
            <hr>
            <?php //the mysqli version
            $searchtitle = "";
            $searchauthor = "";

            if (isset($_POST) && !empty($_POST)) { // Get data from form
                $searchtitle = trim($_POST['searchtitle']);
                $searchauthor = trim($_POST['searchauthor']);
            }

            $searchtitle = mysqli_real_escape_string($db, $searchtitle);
            $searchtitle = htmlentities($searchtitle); //xxs, protects input from coding
            $searchauthor = mysqli_real_escape_string($db, $searchauthor);
            $searchauthor = htmlentities($searchauthor); //xxs, protects input from coding

            $searchtitle = addslashes($searchtitle);
            $searchauthor = addslashes($searchauthor);

            //Open the database
            @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }

            //Build the query. Users are allowed to search on title, author, or both
            $query = " SELECT bookid, title, author, onloan, duedate FROM books";
            if ($searchtitle && !$searchauthor) { // Title search only
                $query = $query . " where title like '%" . $searchtitle . "%'";
            }
            if (!$searchtitle && $searchauthor) { // Author search only
                $query = $query . " where author like '%" . $searchauthor . "%'";
            }
            if ($searchtitle && $searchauthor) { // Title and Author search
            $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
        }

        //echo "Running the query: $query <br/>"; # For debugging

        # Here's the query using an associative array for the results
        //$result = $db->query($query);
        //echo "<p> $result->num_rows matching books found </p>";
        //echo "<table border=1>";
        //while($row = $result->fetch_assoc()) {
        //echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
        //}
        //echo "</table>";
         

        # Here's the query using bound result parameters
            // echo "we are now using bound result parameters <br/>";
        $stmt = $db->prepare($query);
        $stmt->bind_result($bookid, $title, $author, $onloan, $duedate);
        $stmt->execute();

        echo '<table bgcolor="#fff" cellpadding="6">';
        echo '<tr><td>ID</td> <b> <td>Title</td> <td>Author</td> <td>Reserved?</td> <td>Reserve</td> </b> </tr>';

        while ($stmt->fetch()) {
            if ($onloan == 0) {
                $onloan = 'NO';

            echo "<tr>";
            echo "<td> $bookid </td> <td> $title </td> <td> $author </td> <td> $onloan </td>";
            echo '<td><a href="reserveBook.php?bookid=' . urlencode($bookid) . '"> Reserve </a></td>';
            echo "</tr>";
            } else {
            $onloan = 'YES'; 

            echo "<tr>";
            echo "<td> $bookid </td> <td> $title </td> <td> $author </td> <td> $onloan </td>";
            echo "</tr>";
            }
        }
    
            echo "</table>";
    ?>


        </div>
        <?php include("footer.php"); ?>
    </body>
</html>