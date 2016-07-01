<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./js/jcanvas.min.js"></script>
<script src="./js/drawCanvas.js"></script>
<title>canvas</title>
</head>
<body>

<?php
	session_start();

	if(!isset($_SESSION["ID"])){
		header("Location: login.php");
		exit();
	}else{
		include "./html/memberTop1.txt";
		$userID = $_SESSION["ID"];
		printf('<p class="textmargin-p">'. $userID. ' さん</p>');
		printf(
			'<form action="member.php" method="post">
				<p><span class="button"><input type="submit" value="ログアウト"></span></p>
				<input type="hidden" name="logout" value="1">
			</form>'
		);
		include "./html/memberTop2.txt";
		if(isset($_REQUEST["logout"])){
			$_SESSION = array();			// セッション変数を解除
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');// セッションcookieを削除
			}
			session_destroy();// セッションを破棄
			header("Location: index.html");
			exit();
		}
		include "./html/canvas.txt";
	}
?>

<!--p>最近投稿された画像</p>
<img src="./img/test.png" width="500px" height="400px" alt=""-->

</body>
</html>
