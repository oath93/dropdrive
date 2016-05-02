<?php
include "connect.php";
if(isset($_POST['submit'])) {
    if (isset($_GET['go'])) {
        if (preg_match("/^[  a-zA-Z]+/", $_POST['filename'])) {
            $file_name = $_POST['filename'];
        }
    }
}

?>