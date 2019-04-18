<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会員参照</title>
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
		スタッフ<br>
		スタッフコード：<br><?php print $kaiin_code ?><br>
		スタッフ名：<br><?php print $kaiin_name ?><br>
</body>
</html>