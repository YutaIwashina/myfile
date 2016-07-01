<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<title>カレコレ</title>
</head>
<body>

	<div id="wrapper">
		<div id="up">
			<div class="right_Cullum">
				<div class="koma1"><a href="index.php"><img src="./html_img/logo3-0.png" width="302px" height="214px" alt="ロゴ"></a></div>
				<div class="koma2">
					<h2 class="textmargin-h2"><span class="red">カ</span>レコ<span class="blue">レ</span>とは</h2>
					<p class="textmargin-p">多くの参加者と、リレー形式で<br>マンガを<span class="underline">カレンダー</span>上に創り、<br>直接描き、閲覧することができる<br>WEBアプリです。</p>
				</div>
			</div>

			<div class ="koma3">
				<h3 class="textmargin-h3"><a href="entry.php">新規アカウント登録</a></h3>
				<h3 class="textmargin-h3"><a href="login.php">ログイン</a></h3>
				<img src="./html_img/gpen.png" width="232px" height="253px" alt="Gペン">
			</div>
		</div>


		<div id="down">
			<div class="right_Cullum">
				<div class="koma5">

					<?php
						include "./DEF/def.php";
						$link = mysqli_connect(DB_URL,DB_USER,DB_PASS,DB) or die("MySQLへの接続に失敗しました。");
						$sql = sprintf("SELECT * from user");
						$result = mysqli_query($link, $sql) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
						$rows = mysqli_num_rows($result);
						$random = rand(1, $rows);
						$komaNAME = $random;
						$komaNAME .= date("Ymd");

						$fileNAME = './img/'. $komaNAME.'.png';
						printf('<img src="./img/120160308.png" width="300px" height="240px" alt="今日のコマ">');

						/*
						if(file_exists($fileNAME)){
						printf('<img src="'. $fileNAME.'" width="300px" height="240px" alt="今日のコマ">');

						}else{
						printf('<img src="./html_img/empty.png" width="300px" height="240px" alt="今日のコマ">');
						}
						*/
					?>
					<p class="tate">今日のコマはこちら！</p>

				</div>
			</div>
			<div class="koma4">
				<p class="tate"><a href="collection.php">サンプルページへ</a></span>
			</div>
		</div>

	</div>

</body>
</html>
