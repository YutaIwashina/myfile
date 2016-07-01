<?php
	session_start();
	ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./js/jcanvas.min.js"></script>
<script src="./js/drawCanvas.js"></script>
<title>カレコレ - メンバーページ</title>
</head>
<body>

<?php

	if(!isset($_SESSION["ID"])){
		header("Location: login.php");
		exit();
	}else{
		include "./html/memberTop1.txt";
		$YEAR = date("Y");
		$MONTH = date("m");
		$downMONTH = $MONTH - 1;
		$upMONTH = $MONTH + 1;
		$userID = $_SESSION["ID"];
		$userNUM = $_SESSION["NUM"];
		printf('<p class="textmargin-p">'. $userID. ' さん</p>');
		printf(
			'<form action="member.php" method="post">
			<p><span class="button"><input type="submit" value="ログアウト"></span></p>
			<input type="hidden" name="logout" value="1">
			</form>'
		);
		//include "./html/memberTop2.txt";
		printf(
			'</div>
			</div>

			<div class="koma10">
				<img src="./html_img/calen.png" width="202px" height="202px" alt="カレンダー見本">
				<p class="textmargin-p">カレンダーに<br>カーソルを合わせて、クリックして進んでください。</p>
			</div>
			<div class="koma11">
				<ul>
					<li><a href="#">'. $YEAR. ' '. $downMONTH. '月</a>＜</li>
					<li>'. $YEAR. ' '. $MONTH. '月</li>
					<li>＞<a href="#">'. $YEAR. ' '. $upMONTH. '月</a></li>
					</ul>
			</div>
			</div>'
		);
		if(isset($_REQUEST["logout"])){
			$_SESSION = array();				// セッション変数を解除
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');// セッションcookieを削除
			}
			session_destroy();					// セッションを破棄
			header("Location: index.php");
			exit();
		}
		include "./html/calendar201607.txt";			//カレンダー
	}
?>

</div>

</body>
</html>
