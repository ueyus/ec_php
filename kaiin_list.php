<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>
<?php
		try {
			$dsn = 'mysql:dbname=ec_db_php;host=localhost;';
			$user = 'test';
			$password = '';
			$db = new PDO($dsn, $user, $password);

			$sql = 'select code, name from kaiin_masta whrere 1';
			$stmt = $db->query($sql);
			$stmt->execute();

			$db = null;

			print '会員一覧<br><br>';
			print '<form action="kaiin_edit.php" method="post">';

			while (true) {
				$rec = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($rec == false) {
						break;
				}
				print '<input type="radio" name="kaiin_code" value="' . $rec['code'] . '">';
				print $rec['name'];
				print '<br>';
			}

			print '<input type="submit" value="修正">';
			print '</form>';

		} catch (Exception $e) {
				print 'system error !!!';
				exit();
		} 
?>
</body>
</html>