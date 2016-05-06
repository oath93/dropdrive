<?php
include "connect.php";
$file= htmlspecialchars($_GET["filename"]);
$file_location = '/uploads/'.$file;

header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=\"" . basename($file_location) . "\";");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Content-Length: '.filesize($file_location));
header('Pragma: public');
ob_clean();
flush();
readfile("..".$file_location);
?>