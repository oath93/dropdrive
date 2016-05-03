<?php
include "connect.php";
if(isset($_POST['filename'])) {
    if (isset($_GET['go'])) {
        if (preg_match("/^[  a-zA-Z]+/", $_POST['filename'])) {
            $file_name = $_POST['filename'];
            echo "Search: " . $file_name . "<br>";
		}
		else
		{
			//echo "preg_match<br>";
			die();
		}
      }
      else
	  {
		  //echo "isset(_GET['go'])<br>";
		  die();
      }
    }
	else
	{
		echo "isset POST<br>";
		die();
	}
	
	$query = "SELECT user_id, fileName FROM file_tbl WHERE fileName LIKE '%$file_name%'";
	//echo $query . "<br>";
            $result = mysqli_query($dbconnection, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo "User: " . $row["user_id"] . " - File Name: " . $row["fileName"]."<br>";
				}
			}
			else
				echo "0 results";

  mysqli_close($dbconnection);
?>
