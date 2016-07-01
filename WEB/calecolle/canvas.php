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
<title>カレコレ - お絵かきページ</title>
</head>

<body>



	<?php
	$userNUM = $_SESSION["NUM"];
	$month = $_GET["month"];
	$day = $_GET["day"];
	$year = $_GET["year"];

	if($month < 10){
		$Month = "0". $month;
	}else{
		$Month = $month;
	}
	if($day < 10){
		$Day = "0". $day;
	}else{
		$Day = $day;
	}

	$dataNAME = $userNUM;
	$dataNAME .= $year;
	$dataNAME .= $Month;
	$dataNAME .= $Day;				//$dataNAME = $userNUM + $year + $month + $day
	$_SESSION["dataNAME"] = $dataNAME;

	if(!isset($_SESSION["ID"])){
		header("Location: login.php");
		exit();
	}else{
		$userID = $_SESSION["ID"];
		printf('
			<div id="wrapper">
				<div id="up2">
					<div class="right_Cullum">
						<div class="koma8">
							<a href="index.php"><img src="./html_img/logo3-0mini.png" width="170px" height="120px" alt="ロゴ"></a>
						</div>
						<div class="koma9">
							<h2 class="textmargin-h2">こんにちは</h2>
							<p class="textmargin-p">'. $userID. ' さん</p>
							<form action="member.php" method="post">
								<p><span class="button"><input type="submit" value="ログアウト"></span></p>
								<input type="hidden" name="logout" value="1">
							</form>
						</div>
					</div>

					<div class="koma10">
						<h4 class="textmargin-h4">画像を直接投稿される方はこちらから</h4>
						<form action="save2.php" method="post" enctype="multipart/form-data">
							<input type="file" name="upfile" size="30">
							<input type="submit" value="アップロード">
						</form>
						<p class="textmargin-p2">
							注1:画像サイズは<span class="underline">高さ400px、幅500px</span>でないと<br>
							<span id="tyu1_margin">画像が崩れる場合があります。</span><br>
							注2:画像ファイルは<span class="underline">png形式</span>でお願いします。
						</p>

					</div>
					<div class="koma11">
						<p class="textmargin-p">
							現在<span id="koma11font">'. $month. '月'. $day. '日</span>を選択中です。<br>
							<a href="member.php"><span class="underline">メンバーページへ</span></a>戻る
						</p>
					</div>
				</div>
		');
		if(isset($_REQUEST["logout"])){
			$_SESSION = array();			// セッション変数を解除
			if (isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time()-42000, '/');// セッションcookieを削除
			}
			session_destroy();// セッションを破棄
			header("Location: index.php");
			exit();
		}
		include "./html/canvas.txt";
	}
?>

<!--p>最近投稿された画像</p>
<img src="./img/test.png" width="500px" height="400px" alt=""-->

</body>
</html>
