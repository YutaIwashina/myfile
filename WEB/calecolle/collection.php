<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<title>カレコレ - サンプルページ</title>
</head>
<body>

<div id="wrapperSample">
	<?php
		$defaultNAME = "220160301";
		$fileNAME = './img/'. $defaultNAME.'.png';
		for($i=0;$i<=31;$i++){
			$name = $defaultNAME + $i;
			$fileNAME = './img/'. $name.'.png';
			if(file_exists($fileNAME)){
				printf('<img src="'. $fileNAME.'" width="500px" height="400px" alt="">');
			}else{
				printf('<img src="./html_img/empty.png" width="500px" height="400px" alt="">');
			}
		}
	?>
</div>


</body>
</html>
