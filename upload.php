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
        if(isset($_POST['upload']) && $_FILES['upload']['size'] > 0){
            $fileName = $_FILES['upload']['name'];
            $tmpName  = $_FILES['upload']['tmp_name'];
            $fileSize = $_FILES['upload']['size'];
            $fileType = $_FILES['upload']['type'];
            echo $fileName.$tmpName.$fileSize.$fileType;
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
