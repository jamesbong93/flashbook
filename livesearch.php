<?php

session_start();

include 'C:\wamp\www\flashbook\connect_database.php';

$query_count = "SELECT * FROM books";
$result_count = $conn->query($query_count);
				
While($row = $result_count->fetch_assoc()){
	
	$a[] = $row["Name"];
	
}

			


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
				$query_se = "SELECT ISBN FROM books where Name = '".$name."'";

				$result_se = $conn->query($query_se);
				$row = $result_se->fetch_assoc();

				$book_id = $row["ISBN"];
				?>  <br><img  src ="books_pic\<?php echo $book_id?:0; ?>.jpg" height = "20px" width = "20px"><a href= "item_info.php?ISBN_past=<?php echo $book_id;?>">  <?php echo $name;?></a><?php
            } 
			 else {
                $hint .= " <br> $name<br>";
				$query_se = "SELECT ISBN FROM books where Name = '".$name."'";

				$result_se = $conn->query($query_se);
				$row = $result_se->fetch_assoc();

				$book_id = $row["ISBN"];
				?>  <br><img  src ="books_pic\<?php echo $book_id?:0; ?>.jpg" height = "20px" width = "20px"><a href= "item_info.php?ISBN_past=<?php echo $book_id;?>">  <?php echo $name;?> </a><?php
				
            }
        }
    }
}


/**/
// Output "no suggestion" if no hint was found or output correct values 

?>