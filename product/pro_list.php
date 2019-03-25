<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>
<?php
		try {
			$dsn = 'mysql:dbname=ec_test_php;host=localhost;';
			$user = 'an';
			$password = 'password';
			$db = new PDO($dsn, $user, $password);
			$db->query('set names utf8');

			$sql = 'select code, name, price from mst_product';
			$stmt = $db->prepare($sql);

			$stmt->execute();

			$db = null;

			print '商品一覧<br><br>';
			print '<form action="pro_branch.php" method="post">';

			while (true) {
				$rec = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($rec == false) {
						break;
				}
				print '<input type="radio" name="pro_code" value="' . $rec['code'] . '">';
				print $rec['name'] . '---' . $rec['price'];
				print '<br>';
			}

			print '<input type="submit" name="add" value="追加">';
			print '<input type="submit" name="disp" value="参照">';
			print '<input type="submit" name="edit" value="修正">';
			print '<input type="submit" name="delete" value="削除">';
			print '</form>';

		} catch (Exception $e) {
				print 'system error !!!';
				print $e;
				exit();
		} 
?>

<a href="../kaiin_top.php">トップ画面へ</a>
</body>
</html>