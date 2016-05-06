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
    <?php
    include "connect.php";
    if(empty($_SESSION['LoggedIn'])){   //If there is no LoggedIn info, set to false
        $_SESSION['LoggedIn'] = false; 
    }
    if(!$_SESSION['LoggedIn']) {
        ?>
        <a href="sign_up.html">
            <div style="float:right;" class="button">Sign-Up</div>
        </a>
        <a href="login.html">
            <div style="float:right;margin-right:3px" class="button" class="search">&nbsp Login &nbsp</div>
        </a>
        <?php
    }else{
        ?>
        <a href="sign_out.php">
            <div style="float:right;" class="button">Log Out</div>
        </a>
        <a href="upload.html">
            <div style="float:right; margin-right:3px;" class="button">Upload a File</div>
        </a>
        <a href="userpage.php">
            <div style="float:right; margin-right:3px;" class="button">User Page</div>
        </a>
        <?php
    }?>

    <br />
	
	<?php
	  $query = "SELECT COUNT(*) AS num_files FROM file_tbl WHERE public_flag != 0";
	  $result= mysqli_query($connection, $query);
	  $count = mysqli_fetch_assoc($result);
	  echo "<p style='margin-left: 35%;'>There are currently " . $count['num_files'] . " files in the system!<p><br />";
	?>
    <p>
    	<form method="post" action="search.php" id="searchform">
		    <input type="text" name="filename" class="search" placeholder="Search for Files...">
            <br />
            <br />
	        <input type="submit" name = "submit" value = "Search" class="button" style="margin-left:45%"; >
		</form>
    
    </p>
	<br />
    <br />
    <br />
    <br />
</div>
</body>
</html>
