<?php
session_start();
$dataNAME = $_SESSION["dataNAME"];
$imageData = $_POST["image"];
$filename = "./img/".$dataNAME.".png";
$fp = fopen($filename, 'w');
fwrite($fp,base64_decode($imageData));
fclose($fp);
?>