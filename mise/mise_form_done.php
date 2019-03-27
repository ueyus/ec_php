<?php
	session_start();
	session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php

try {
	require_once('../common/common.php');

	$post = sanitize($_POST);

	$onamae = $post['onamae'];
	$email = $post['email'];
	$postal1 = $post['postal1'];
	$postal2 = $post['postal2'];
	$address = $post['address'];
	$tel = $post['tel'];

	print $onamae . '様<br>';
	print 'ご注文ありがとう<br>';
	print $email . 'にメールを送りましたので、ご確認お願いします。<br>';
	print '商品は以下の住所へ発送させていただきます。<br>';
	print $postal1 . '-' . $postal2 . '<br>';
	print $address . '<br>';
	print $tel . '<br>';

	$honbun = '';
	$honbun .= $onamae . "様　\nこのたびはご注文ありがとうございました。\n";
	$honbun .= "\n";
	$honbun .= "ご注文商品\n";
	$honbun .= "-------------\n";

	$cart = $_SESSION['cart'];
	$count = $_SESSION['count'];
	$max = count($cart);

	$dsn = 'mysql:dbname=ec_test_php;host=localhost';
	$user = 'an';
	$password = 'password';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	for ($i = 0; $i < $max; $i++) {
		$sql = 'select name, price from mst_product where code=?';
		$stmt = $dbh->prepare($sql);
		$data[0] = $cart[$i];
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

		$name = $rec['name'];
		$price = $rec['price'];
		$suryo = $count[$i];
		$shokei = $price * $suryo;

		$honbun .= $name . '';
		$honbun .= $price . '円　x';
		$honbun .= $suryo . '個　=';
		$honbun .= $shokei . "円\n";
	}

	$dbh = null;

	$honbun .= "送料は無料です。\n";
	$honbun .= "-------------------\n";
	$honbun .= "\n";
	$honbun .= "代金は以下の口座にお振込みください。\n";
	$honbun .= "テスト銀行　テスト支店　口座1111111111\n";
	$honbun .= "入金確認が取れ次第、梱包、発送させていただきます。\n";
	$honbun .= "\n";
	$honbun .= "◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇\n";
	$honbun .= "　～安心野菜の〇〇農園～　\n";
	$honbun .= "\n";
	$honbun .= "〇〇県〇市\n";
	$honbun .= "電話：　22222222\n";
	$honbun .= "FAX：　33333333333\n";
	$honbun .= "\n";
	$honbun .= "◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇◇\n";

	/*
	print '<br>';
	print nl2br($honbun);
	**/

	$title = 'ご注文ありがとうございます。';
	$header = 'From:info@';
	$honbun = html_entity_decode($honbun, $ENT_QUOTES, 'UTF-8');
	mb_language('Japanese');
	mb_internal_encoding('UTF-8');
	mb_send_mail($email, $title, $honbun, $header);


} catch (Exception $e) {
	print $e;
	print 'ただいま障害によりご迷惑をおかけしています。';
	exit();
}

?>

</body>
</html>