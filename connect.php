<?php
if(!isset($_SESSION)) {
    session_start();
}
$user = 'root';
$pass = '';
$db = 'dropdrive_db';

$connection = new mysqli('localhost', $user, $pass, $db) or die("Unable to Connect");
?>
