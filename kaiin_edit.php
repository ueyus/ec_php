<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>
<?php
		try {

			$kaiin_code = $_POST['kaiin_code'];
			//　ここでサニタイジング
			// $kaiin_code = htmlspecialchars($kaiin_code);

			$dsn = 'mysql:dbname=ec_db_php;host=localhost;';
			$user = 'test';
			$password = '';
			$db = new PDO($dsn, $user, $password);

			$sql = 'select code, name from kaiin_masta whrere = ?';
			$stmt = $db->query($sql);
			$stmt->execute();

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			$db = null;

		} catch (Exception $e) {
				print 'system error !!!';
				exit();
		} 
?>
		<form action="kaiin_edit_check.php" method="post">
				会員コード：<br>
				<input type="text" name="code" value="<?php print $rec['code']; ?>"><br>
				名前：<br>
				<input type="text" name="name" value="<?php print $rec['name']; ?>"><br>
				パスワード：<br>	
				<input type="password" name="password1">
				パスワード確認用：<br>
				<input type="password" name="password2">
				<input type="button" onclick="history.back()" value="戻る">
				<input type="submit" value="送信">
		</form>

</body>
</html>