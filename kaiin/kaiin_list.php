<?php
	session_start();
	session_regenerate_id(true);
	if (isset($_SESSION['login']) == false) {
		print 'ログインされていません。';
		print '<a href="../kaiin_login/kaiin_login.html">ログイン画面へ</a>';
		exit();
	} else {
		print $_SESSION['kaiin_name'];
		print 'さんログイン中<br>';
		print '<br>';
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>会員リスト</title>
</head>
<body>
<?php
		try {
			$dsn = 'mysql:dbname=ec_test_php;host=localhost;';
			$user = 'an';
			$password = 'password';
			$db = new PDO($dsn, $user, $password);
			$db->query('set names utf8');

			$sql = 'select code, name from mst_tbl';
			$stmt = $db->prepare($sql);

			$stmt->execute();

			$db = null;

			print '会員一覧<br><br>';
			print '<form action="kaiin_branch.php" method="post">';

			while (true) {
				$rec = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($rec == false) {
						break;
				}
				print '<input type="radio" name="kaiin_code" value="' . $rec['code'] . '">';
				print $rec['name'];
				print '<br>';
			}

			print '<input type="submit" name="add" value="追加">';
			print '<input type="submit" name="disp" value="参照">';
			print '<input type="submit" name="edit" value="修正">';
			print '<input type="submit" name="delete" value="削除">';
			print '</form>';

		} catch (Exception $e) {
				print 'system error !!!';
				print $e;
				exit();
		} 
?>

<a href="../kaiin_top.php">トップ画面へ</a>
</body>
</html>