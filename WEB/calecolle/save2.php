<?php
session_start();
$dataNAME = $_SESSION["dataNAME"];
$imageData = $_FILES["upfile"];
$filename = "./img/".$dataNAME.".jpg";
rename($imageData, $filename);
?>
