<?php
$InternalEncoding = 'UTF-8';
mb_internal_encoding($InternalEncoding);
$MySelf = basename($_SERVER['SCRIPT_NAME']);

// 【１】ファイル選択 ========================================================
if (! isset($_FILES["image"])) {
echo <<< EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$InternalEncoding" />
<title>JPEG=>PNGファイル変換</title>
</head>
<body>
<h1>■JPEG=>PNGファイル変換</h1>
<form method="post" enctype="multipart/form-data" action="$MySelf">
JPEGファイル：
<input name="image" type="file" size="50" />　
<input type="submit" name="exec" value="変換" />　
<input type="reset"  name="reset" value="リセット" />
</form>
</body>
</html>

EOF;
// 【２】画像変換・出力 ======================================================
} else {
  $filedir = "./img/";
	if (function_exists('imagecreatefromjpeg')) {
		$sour = $_FILES['image']['tmp_name'];
		$img = @imagecreatefromjpeg($sour);
		if (! $img) {
			$errmsg = $_FILES['image']['name'] . ' はJPEG画像ファイルではありません';
		} else {
			$errmsg = NULL;
			header("Content-Type: image/png");
			header("Content-Disposition: attachment; filename=image.png");
			imagepng($img);
		}
	} else {
		$errmsg = 'GDライブラリがインストールされていません';
	}

//エラーメッセージ表示
	if ($errmsg != NULL) {
echo <<< EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$InternalEncoding" />
<title>JPEG=>PNGファイル変換</title>
<meta name="author" content="studio pahoo" />
<meta name="copyright" content="studio pahoo" />
<meta name="ROBOTS" content="NOINDEX,NOFOLLOW" />
</head>
<body>
<h1>■JPEG=>PNGファイル変換</h1>
エラーが発生しました　：　$errmsg
</body>
</html>

EOF;
	}
}
/*
** バージョンアップ履歴 ===================================================
 *
 * @version		1.1  2009/05/03 エラー処理を追加しました
 * @version		1.0  2007/01/16
*/
?>
