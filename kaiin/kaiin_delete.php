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
		スタッフ削除<br>
		スタッフコード：<br><?php print $kaiin_code; ?><br>
		スタッフ名：<br><?php print $kaiin_name; ?><br>
		このスタッフを削除してもよろしいですか？<br>
		<form action="kaiin_delete_done.php" method="post">
			<input type="hidden" name="code" value="<?php print $kaiin_code; ?>">
			<input type="hidden" name="name" value="<?php print $kaiin_name; ?>">
			<input type="button" onclick="history.back()" value="戻る">
			<input type="submit" value="OK">
		</form>

</body>
</html>