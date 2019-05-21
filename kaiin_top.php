<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
	print 'ログインされていません。';
	print '<a href="./kaiin_login/kaiin_login.html">ログイン画面へ</a>';
	exit();
} else {
	print $_SESSION['kaiin_name'];
	print 'さんログイン中<br>';
	print '<br>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<a href="./kaiin/kaiin_list.php">会員管理</a><br>
	<a href="./product/pro_list.php">商品管理</a>
	<a href="./order/order_download.php">注文ダウンロード</a>
	<a href="./kaiin_login/kaiin_logout.php">ログアウト</a>
</body>
</html>

