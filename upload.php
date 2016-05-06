<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" , type="text/css" , href="base.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Main Page</title>
</head>

<body>
<a href="index.php"><img style="margin-left: 45%; margin-top:5%;" src="logo.png"></a>
<div class="login">
</div>

<div id = "main_content">
    <br />
    <p>
        <?php
        include"connect.php";
        if(empty($_SESSION['Username'])){
            $_SESSION['Username'] = "Test_User";
            $_SESSION['LoggedIn'] = true;
        }
        $target_dir = "uploads/".$_SESSION['Username']."/";
        if(isset($_POST['submit'])){
            $ext_start = $nameLength = strlen($_FILES['upload']['name']);
            $captured_name = $_FILES['upload']['name'];
            $found_ext_start = false;
            do{
                if($captured_name[$ext_start - 1] != '.')
                {
                    $ext_start --;
                }else{
                    $found_ext_start = true;
                }
            }while(!$found_ext_start);
            $extension = substr($captured_name, $ext_start, $nameLength);
            if($_POST['fileName'] != null) {
                $fileName = $_POST['fileName'];
            }else{
                $fileName = substr($captured_name, 0, $ext_start - 1);
            }
            if(empty($_POST['public'])){
                $public = false;
            }else{
                $public = true;
            }
            $tmpName  = $_FILES['upload']['tmp_name'];
            $fileSize = $_FILES['upload']['size'];
            $fileType = $_FILES['upload']['type'];
            $target_file = $target_dir.$fileName;
            if(!is_dir($target_dir)){
                mkdir($target_dir);
            }
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file.".".$extension)) {
                echo "<h3 style='margin-left: 25%;'>The file ". $fileName.".".$extension." has been uploaded!</h3>";
			    //Get the date
				$query= "Select CurDate() As date";
				if($result = mysqli_query($connection, $query))
				{
				  $date= mysqli_fetch_assoc($result);
				}
				else
				{
					echo "Couldn't get date: ". mysqli_error($connection);
				}
				//Inserting info into the database
				$query = "Insert Into file_tbl(fileName, filePath, public_flag, upload_date, user_id) Values('$fileName', '$target_dir', $public, '". $date['date']. "', '" . $_SESSION['Username'] ."')";
				if(mysqli_query($connection, $query))
				{
					echo "<p style='margin-left: 25%;'>File information in database.</p>";
					if(isset($_POST['type']))
					{
						$fileForm = $_POST['type'];
						if($fileForm == "video")
						{
							$query="Insert Into video_file_tbl(fileName, user_id) Values('$fileName', '".$_SESSION['Username']."')";
							if(mysqli_query($connection, $query))
						    {
								echo "Insertion successful";
							}
							else
								echo "Error: ". mysqli_error($connection);
						}
						elseif($fileForm =="text")
						{
							$query="Insert Into text_file_tbl(fileName, user_id, file_format) Values('$fileName', '".$_SESSION['Username'] ."', '$extension')";
							if(mysqli_query($connection, $query))
						    {
								echo "Insertion successful";
							}
							else
								echo "Error: ". mysqli_error($connection);
						}	
					}
				}
				else
				{
				  echo "Insertion failed: ". mysqli_error($connection);	
				}
            }
            else{
                echo "The file could not be uploaded.";
            }
        }
        ?>
    </p>

    <p style='margin-left: 25%;'>Would you like to upload another file?
    <br/>
    <br/>
    <a href="upload.html" class="button">Upload Another</a>
        <a href="userpage.php" class="button">Return to User Page</a>
        <a href="index.php" class="button">Return Home</a>
    </p>
</div>
</body>
</html>
