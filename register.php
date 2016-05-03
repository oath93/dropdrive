<html>
  <head>
    <title>Sign Up</title>
	<?php
	  include "connect.php";
	  
	  $fname = ($_POST['fname']);
	  $lname = ($_POST['lname']);
	  $uid = ($_POST['UID']);
	  $pass = ($_POST['password1']);
	  $email = ($_POST['email']);
	  
	  if(!mysqli_select_db($dbconnection, $db))
	  {
		  echo "Database not found!<br>";
		  die();
	  }
	  $query="insert into user_tbl(fname, lname, password, user_id) values('$fname', '$lname','$pass', '$uid')";
	  if(mysqli_query($dbconnection, $query))
	  {
		  echo "Insertion successful<br>";
	  }
	  else
	  {
		  echo "Insertion error: " . mysqli_error($dbconnection) . "<br>";
	  }
	  mysqli_close($dbconnection);
	  die()
	?>
</html>