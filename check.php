<?php
    include "connect.php";
  
    if(isset($_POST['username']) && isset($_POST['password']))
    {
    	$username= ($_POST['username']);
    	$pass= ($_POST['password']);
	
    	$query = "SELECT user_id, fname FROM user_tbl WHERE user_id = '$username' AND password = '$pass'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) == 1)
    	{
			$info = mysqli_fetch_assoc($result);
            $_SESSION['LoggedIn'] = true;
            $_SESSION['Username'] = $username;
			$_SESSION['name'] = $info["fname"];
    	    header("Location: userpage.php");
    	}
    	else
    	{
    	    //should only find exactly one user, try again
            header("Location: login.html");
    	}
    }
    else
    {
    	  //username or password wasn't entered, try again
          header("Location: login.html");
    }
    mysqli_close($connection);
	die();
?>