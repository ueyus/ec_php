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
			$kaiin_pass = $_POST['password1'];
			
			/*
				$kaiin_name = htmlspecialchars($kaiin_name);
				$kaiin_pass = htmlspecialchars($kaiin_pass);
			*/

			$dsn = 'mysql:dbname=ec_db_php;host=localhost;';
			$user = 'test';
			$password = '';
			$db = new PDO($dsn, $user, $password);
			$db->query('SET NAMES utf8');
			$sql = 'insert into kaiin_masta(name, password) values(?, ?)';
			$stmt = $db->prepare($sql);
			$data[] = $kaiin_name;
			$data[] = $kaiin_pass;
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