<?php
$user = 'root';
$pass = '';
$db = 'testdb';

$dbconnection = new mysqli('localhost', $user, $pass, $db) or die("Unable to Connect");
echo "Connected";

?>