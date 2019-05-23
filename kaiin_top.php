<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
	print 'ログインされていません。';
	print '<a href="./kaiin_login/kaiin_login.html">ログイン画面へ</a>';
	exit();
}

?>
<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<title>kaiin_login</title>
	<link rel="stylesheet" href="./css/login.css">
</head>
<body>
	<header>
		<div class="sub">
			<?php
				print $_SESSION['kaiin_name'];
				print 'さんログイン中<br>';
			?>
		</div>
	</header>
	
	<div class="links clearfix">
		<a href="./kaiin/kaiin_list.php" class="btn">会員管理</a>
		<a href="./product/pro_list.php" class="btn">商品管理</a>
		<a href="./order/order_download.php" class="btn">注文ダウンロード</a>
		<a href="./kaiin_login/kaiin_logout.php" class="btn">ログアウト</a>
	</div>
</body>
</html>

