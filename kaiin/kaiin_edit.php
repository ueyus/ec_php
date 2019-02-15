<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>
<?php
		try {

			$kaiin_code = $_GET['kaiin_code'];
			//　ここでサニタイジング
			// $kaiin_code = htmlspecialchars($kaiin_code);

			$dsn = 'mysql:dbname=ec_test_php;host=localhost;';
			$user = 'an';
			$password = 'password';
			$db = new PDO($dsn, $user, $password);
			$db->query('set names utf8');

			$sql = 'select code, name from mst_tbl where code = ?';
			$stmt = $db->prepare($sql);
			$data = [$kaiin_code];
			$stmt->execute($data);

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			$kaiin_name = $rec['name'];

			$db = null;

		} catch (Exception $e) {
				print 'system error !!!';
				print $e;
				exit();
		} 
?>
		スタッフ修正<br>
		スタッフコード：<br><?php print $kaiin_code ?><br>
		<form action="kaiin_edit_check.php" method="post">
				名前：<br>
				<input type="text" name="name" value="<?php print $kaiin_name; ?>"><br>
				パスワード：<br>	
				<input type="password" name="password1">
				パスワード確認用：<br>
				<input type="password" name="password2">
				<input type="button" onclick="history.back()" value="戻る">
				<input type="submit" value="送信">
		</form>

</body>
</html>