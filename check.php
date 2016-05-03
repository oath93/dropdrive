<?php
  include "connect.php";
  
  if(isset($_POST['username']) && isset($_POST['password']))
  {
	$username= ($_POST['username']);
	$pass= ($_POST['password']);
	
	$query = "SELECT user_id FROM user_tbl WHERE user_id = '$username' AND password = '$pass'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1)
	{
	  //Redirect to userpage
	  //echo "Welcome " . $username ."<br>";
	}
	else
	{
	  //should only find exactly one user, try again
	  //echo "Login failed<br>";
	}
  }
  else
  {
	  //username or password wasn't entered, try again
	  //echo "Sign in failed<br>";
  }
	
	
  mysqli_close($connection); 
?>