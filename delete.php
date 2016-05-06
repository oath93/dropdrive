<?php
  include "connect.php";
  $file= htmlspecialchars($_GET["filename"]);
  $file_dir="uploads/".$_SESSION['Username']."$file";
  
  $query = "Delete From file_tbl Where fileName='$file' And user_id='".$_SESSION['Username']."'";
  if(mysqli_query($connection, $query))
  {
	  echo "File Deleted from Database<br/>";
  }
  sleep(1);
  header("Location: userpage.php");
  die();
?>