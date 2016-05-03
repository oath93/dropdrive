<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet", type="text/css", href="base.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Main Page</title>
</head>

<body>
<div class="login">

</div>

<div id = "main_content" style=margin-top: 5%;">
    <br />
    <p>
        <?php
        include"connect.php";
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES['upload']['name']);
        if(isset($_POST['submit'])){
            $ext_start = $nameLength = strlen($_FILES['upload']['name']);
            $captured_name = $_FILES['upload']['name'];
            $found_ext_start = false;
            do{
                if($captured_name[$ext_start-1] != '.')
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
            $tmpName  = $_FILES['upload']['tmp_name'];
            $fileSize = $_FILES['upload']['size'];
            $fileType = $_FILES['upload']['type'];

            echo $fileName." ".$extension;
        }
        ?>
    </p>
    <br />
    <br />
    <br />
    <br />
</div>
</body>
</html>
