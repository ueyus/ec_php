<?php

try {
	$kaiin_code = $_POST['code'];
	$kaiin_pass = $_POST['pass'];

	#$kaiin_code = htmlspecialchars($kaiin_code);
	#$kaiin_pass = htmlspecialchars($kaiin_pass);

	$kaiin_pass = md5($kaiin_pass);

	$dsn = 'mysql:dbname=ec_test_php;host=localhost;';
	$user = 'an';
	$password = 'password';
	$db = new PDO($dsn, $user, $password);
	$db->query('set names utf8');

	$sql = 'select name mst_tbl where code = ? and password = ?';
	$stmt = $db->prepare($sql);
	$data = [$kaiin_code, $kaiin_pass];
	$stmt->execute($data);
var_dump($data);
	$db = null;

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($rec == false) {
		print '会員コードかパスワードが間違っています';
		print '<a href="kaiin_login.html">戻る</a>';
	} else {
		header('Location:kaiin_top.php');
	}
} catch (Exception $e) {
	print 'it sysetem error!!!';
	exit();
}

?>