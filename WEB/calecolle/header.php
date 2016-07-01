<?php
//ログイン成功時
$_SESSION["ID"] = $_POST["id"];
$_SESSION["NUM"] = $row['NUM'];
header("Location: member.php");
exit();
