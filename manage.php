<?php
  include "connect.php";
  
  $query = "Select fname, lname, password From user_tbl Where user_id = '". $_SESSION['Username']."'";
  $result = mysqli_query($connection, $query);
  $user_info = mysqli_fetch_assoc($result);
  $curr_pass = $user_info['password'];
  
  
  if($curr_pass == $_POST['password'])
  {
	
	if(!empty($_POST['email']) && $_POST['email'] != "")
    {
	  $query= "Insert Into user_email_tbl(user_id, user_email) Values('".$_POST['email']."', '".$_SESSION['Username']."')";
      if(mysqli_query($connection, $query))
	  {
		  echo "Inserted<br/>";
	  }
	  else
	  {
		  echo mysqli_error($connection);
	  }
	}
  
    if(!empty($_POST['fname']) && $_POST['fname'] != "")
    {
	  $fname = $_POST['fname'];
	  $_SESSION['name'] = $fname;
    }
    else
    {
	  $fname = $user_info['fname'];
	  
    }
  
    if(!empty($_POST['lname']) && $_POST['lname'] != "")
    {
	  $lname = $_POST['lname'];
    }
    else
    {
	  $lname = $user_info['lname'];
    }
  
    if(!empty($_POST['newPass']) && $_POST['newPass'] != "")
    {
	  $pass = $_POST['newPass'];
	  echo $pass;
    }
    else
    {
	  $pass = $user_info['password'];
    }
	
	$query = "Update user_tbl Set fname = '$fname', lname = '$lname', password = '$pass' Where user_id = '".$_SESSION['Username']."' And password = '$curr_pass'";
	if(mysqli_query($connection, $query))
	{
		echo "Info Updated";
	}
	else
	{
		echo mysqli_error($connection);
	}
	
	sleep(1);
	header("Location: userpage.php");
	die();
  }
?>