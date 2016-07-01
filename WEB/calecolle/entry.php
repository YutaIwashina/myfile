<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>カレコレ - 登録画面</title>
</head>
<body>

<div id="wrapper">
	<div id="up">

		<div class="right_Cullum">
			<div class="koma1"><a href="index.php"><img src="./html_img/logo3-0.png" width="302px" height="214px" alt="ロゴ"></a></div>
			<div class="koma2">
				<h2 class="textmargin-h2">さあ、あなたも！</h2>
				<p class="textmargin-p">左の入力フォームに、<br>IDとパスワードを入力して<br>アカウント登録をしてください。</p>
			</div>
		</div>

	<div class ="koma3">

		<!--新規登録処理-->
		<?php
			include "./DEF/def.php";
			$userID = "";
			$userPASS = "";
			$userNUM = "";

			if(isset($_REQUEST["disp_no"])){
				//定義
				$userID = $_REQUEST["id"];
				$userPASS = $_REQUEST["pass"];
				$error = "";

				//ここから入力チェック
				//ID
				if($userID == ""){
					$error .= "IDを入力してください。<br>";
				}else if(!mb_ereg_match("^[0-9|A-z]+$", $userID)){
					$error .= "IDは半角英数字で入力してください<br>";
				}else if(mb_strlen($userID)<4 || mb_strlen($userID)>8){
					$error .= "IDは半角４～８文字で入力してください<br>";
				}else{
					$link = mysqli_connect(DB_URL,DB_USER,DB_PASS,DB);
					$sql = sprintf("SELECT * from user WHERE ID='%s'", $userID);
					$result = mysqli_query($link, $sql);
					$rows = mysqli_num_rows($result);
					if($rows>0){
						$error .= "IDが重複しています。別のIDを入力してください。<br>";
					}
					mysqli_free_result($result);
					mysqli_close($link) or die("MySQL切断に失敗しました。");
				}

				//パスワード
				if($userPASS == ""){
					$error .= "パスワードを入力してください。<br>";
				}else if(!mb_ereg_match("^[!-z]+$", $userPASS)){
					$error .= "パスワードは半角英数記号で入力してください。<br>";
				}else{
					if(mb_strlen($userPASS)<6 || mb_strlen($userPASS)>12){
						$error .= "パスワードは６～１２文字で入力してください。<br>";
					}
				}
			}

			//画面表示
			if(!isset($_REQUEST["disp_no"])){
				printf(file_get_contents("./html/entry.txt") ,"","");
			}else{
				if($error != ""){
					printf(file_get_contents("./html/entry.txt"), $userID, $userPASS);
					printf( '<p class="error"><font color="#f00">'. $error. '</font></p>');
				}else{
					//POSTパラメータ表示
					printf(file_get_contents("./html/entry_parameter.txt"), $userID, $userPASS);

					//登録処理
					$link = mysqli_connect(DB_URL,DB_USER,DB_PASS,DB);
					mysqli_query($link,'SET NAMES utf8') or die("can not SET NAMES sjis");
					$sql = "SELECT * from user";
					$result = mysql_query($link,$sql) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
					$rows = mysqli_num_rows($result);
					$userNUM = $rows + 1;
					$sql2 = "INSERT INTO user VALUES('$userID','$userPASS','$userNUM')";
					$result2 = mysqli_query($link,$sql2) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
					// MySQLへの接続を閉じる
					mysql_close($link) or die("MySQL切断に失敗しました。");
				}
			}
		?>
		<!--登録処理ここまで-->

		</div>
	</div>

	<div id="down">
		<div class="right_Cullum">
			<div class="koma5">
				<img src="./html_img/color.png" width="300px" height="240px" alt="色変更可能">
				<p class="tate">なんとなんと！</p>
			</div>
		</div>
		<div class="koma4">
			<p class="tate"><a href="collection.php">サンプルページへ</a></span>
			</div>
	</div>
</div>
</body>
</html>
