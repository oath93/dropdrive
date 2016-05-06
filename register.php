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
	  
	  if(!mysqli_select_db($connection, $db))
	  {
		  echo "Database not found!<br>";
		  die();
	  }
	  $query="insert into user_tbl(fname, lname, password, user_id) values('$fname', '$lname','$pass', '$uid')";
	  if(mysqli_query($connection, $query))
	  {
		  echo "Insertion successful<br>";
		  header('Location: userpage.php');
		  $_SESSION['Username'] = $uid;
		  $_SESSION['LoggedIn'] = true;
		  $_SESSION['name'] = $fname;
	  }
	  else
	  {
		  echo "Insertion error: " . mysqli_error($connection) . "<br>";
		  header('location: sign_up.html');
	  }
	  mysqli_close($connection);
	  die()
	?>
</html>