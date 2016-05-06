<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet", type="text/css", href="base.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Main Page</title>
    <?php include "connect.php";?>
</head>


<body>
<a href="index.php"><img style="margin-left: 45%; margin-top:5%;" src="logo.png"></a>
<div class="login">

</div>

<div id = "main_content" style="margin-top:-5%;">
<?php
include "connect.php";
if(isset($_POST['filename'])) {
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
	echo "isset POST<br>";
	die();
  }

	$query = "SELECT user_id, fileName FROM file_tbl WHERE fileName LIKE '%$file_name%' AND public_flag != 0";
	//echo $query . "<br>";
            $result = mysqli_query($connection, $query);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo "User: " . $row["user_id"] . " - File Name: " . $row["fileName"]."<br>";
				}
			}
			else
				echo "0 results";

  mysqli_close($connection);
?>
    </p>
    <br />
    <br />
    <br />
    <br />
</div>
</body>
</html>
