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
			$kaiin_name = $_POST['name'];
			
			/*
				$kaiin_code = htmlspecialchars($kaiin_code);
				$kaiin_name = htmlspecialchars($kaiin_name);
				$kaiin_pass = htmlspecialchars($kaiin_pass);
			*/

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

			print $kaiin_name . 'を削除しました <br>';

		} catch (Exception $e) {
			print 'system error!!';
			exit();

		}
?>
</body>
</html>