<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>

<?php
		try {

			$kaiin_code = $_POST['code'];
			// ここでサニタイジング
			// $kaiin_code = htmlspecialchars($kaiin_code);

			$dsn = 'mysql:dbname=ec_test_php;host=localhost;';
			$user = 'an';
			$password = 'password';
			$db = new PDO($dsn, $user, $password);
			$db->query('set names utf8');

			$sql = 'delete from mst_tbl where code=?';
			$stmt = $db->prepare($sql);
			$data[] = $kaiin_code;

			$stmt->execute($data);

			$db = null;

			print $kaiin_code . 'を削除しました <br>';

		} catch (Exception $e) {
			print 'system error!!';
			exit();
		}
?>
</body>
</html>