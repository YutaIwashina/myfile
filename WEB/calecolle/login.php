<?php
session_start();
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>カレコレ - ログイン画面</title>
</head>
<body>

<div id="wrapper">
	<div id="up">
		<div class="right_Cullum">
			<div class="koma1"><a href="index.php"><img src="./html_img/logo3-0.png" width="302px" height="214px" alt="ロゴ"></a></div>
			<div class="koma2">
				<h2 class="textmargin-h2">ようこそ！</h2>
				<p class="textmargin-p">左の入力フォームに、<br>登録されたIDとパスワードを<br>入力してください。</p>
			</div>
		</div>
		<div class ="koma3">
			<!--ログイン処理-->
			<?php

			include "./DEF/def.php";
			$userID = "";
			$userPASS = "";

			//データベース参照→IDパスワードチェック
			if(isset($_REQUEST["disp_no"])){
				$userID = $_REQUEST["id"];
				$userPASS = $_REQUEST["pass"];
				$error = "";
				$link = mysqli_connect(DB_URL,DB_USER,DB_PASS,DB);

				$sql = sprintf("SELECT * from user WHERE id='%s' AND pass='%s'", $userID, $userPASS);
				$result = mysqli_query($link, $sql);
				$rows = mysqli_num_rows($result);
				if($rows !== 1){
					$error = "登録情報と一致しません。";
				}

				$sql2 = sprintf("SELECT NUM from user WHERE id='%s'", $userID);
				$result2 = mysqli_query($link, $sql2) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
				$row = mysqli_fetch_assoc($result2);
			}

			if(!isset($_REQUEST["disp_no"])){
				printf(file_get_contents("./html/login.txt") ,"","");
			}else{
				if($error != ""){
					printf(file_get_contents("./html/login.txt"), $userID, $userPASS);
					printf( '<p class="error"><font color="#f00">'. $error. '</font></p>');
				}else{
					include("header.php");
				}
			}
			?>
			<!--ログイン処理ここまで-->
		</div>
	</div>

	<div id="down">
		<div class="right_Cullum">
			<div class="koma5">
				<img src="./html_img/bold.png" width="300px" height="240px" alt="太さ変更可能">
				<p class="tate">なななんと！</p>
			</div>
		</div>
		<div class="koma4">
			<p class="tate"><a href="collection.php">サンプルページへ</a></span>
			</div>
		</div>
	</div>
</body>
</html>
