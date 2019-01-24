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
			$kaiin_pass = $_POST['password1'];
			
			/*
				$kaiin_code = htmlspecialchars($kaiin_code);
				$kaiin_name = htmlspecialchars($kaiin_name);
				$kaiin_pass = htmlspecialchars($kaiin_pass);
			*/

			$dsn = 'mysql:dbname=ec_db_php;host=localhost;';
			$user = 'test';
			$password = '';
			$db = new PDO($dsn, $user, $password);
			$db->query('SET NAMES utf8');
			$sql = 'update kaiin_masta set name=?, password=?, code=? where=?';
			$stmt = $db->prepare($sql);
			$data[] = $kaiin_name;
			$data[] = $kaiin_pass;
			$data[] = $kaiin_code;
			$data[] = $kaiin_code;
			$stmt->execute($data);

			$db = null;

			print $kaiin_name . 'を更新しました <br>';

		} catch (Exception $e) {
			print 'system error!!';
			exit();

		}
?>
</body>
</html>