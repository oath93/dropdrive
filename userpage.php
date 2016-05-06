<?php  //Don't allow people who aren't logged in
include "connect.php";
if(isset($_SESSION['name']))
  echo "Welcome, " . $_SESSION['name'] . "<br/>";
if(!$_SESSION['LoggedIn']){
   header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link rel="stylesheet", type="text/css", href="base.css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Main Page</title>

</head>

<body>
<a href="index.php"><img style="margin-left: 45%; margin-top:5%;" src="logo.png"></a>
<div class="login">

</div>

<div id = "main_content">
      <a href="sign_out.php">
         <div style=float:right; class="button">Log Out</div>
      </a>
	  <a href="upload.html">
          <div style="float:right; margin-right:3px;" class="button">Upload a File</div>
      </a>
      <a href="acct_man.html">
         <div style="float:right;" class="button">Account Management</div>
      </a>
	  
    <?php
      include "connect.php";
      //echo $_SESSION['LoggedIn'];
      echo "<br/><br/><br/>";

      if(!$_SESSION['LoggedIn']){
      header("Location: index.php");
      }

      $sql = "Select fileName, upload_date, public_flag From file_tbl Where user_id = '" .$_SESSION['Username'] ."'";
      $result = mysqli_query($connection, $sql);
  
      while($row = mysqli_fetch_assoc($result))
      {
	    echo "File Name: " . $row['fileName'] . " Uploaded: " . $row['upload_date'] . " Public?: ";
	    if($row['public_flag'])
		  echo "Yes ";
	    else
		  echo "No ";
	  
	    echo '<a href="delete.php?filename='.$row['fileName'].'">   Delete</a> <br/><br/>';
      }
    mysqli_close($connection);
?>



   <br />
   <p>

   </p>
   <br />
   <br />
   <br />
   <br />
</div>
</body>
</html>

