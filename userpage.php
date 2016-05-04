<a href="index.php"><img style="margin-left: 45%; margin-top:5%;" src="logo.png"></a>

<?php
include "connect.php";

echo $_SESSION['Username'];
echo $_SESSION['LoggedIn'];
echo "<br/>";

if(!$_SESSION['LoggedIn']){
   header("Location: index.php");
}
echo "got to userpage!"

?>


