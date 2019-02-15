<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>

<?php
		try {
			$kaiin_name = $_POST['name'];
			$kaiin_pass = $_POST['password'];
			
			/*
				$kaiin_name = htmlspecialchars($kaiin_name);
				$kaiin_pass = htmlspecialchars($kaiin_pass);
			*/

			$dsn = 'mysql:dbname=ec_test_php;host=localhost;';
			$user = 'an';
			$password = 'password';
			$db = new PDO($dsn, $user, $password);
			$db->query('set names utf8');

			$sql = 'insert into mst_tbl(name, password) values(?, ?)';
			$stmt = $db->prepare($sql);
			$data = [$kaiin_name, $kaiin_pass];
		var_dump($data);
		var_dump($_POST);
			$stmt->execute($data);

			$db = null;

			print $kaiin_name . 'を追加しました <br>';

		} catch (Exception $e) {
			print 'system error!!';
			exit();

		}
?>
</body>
</html>