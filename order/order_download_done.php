<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
	print 'ログインされていません。';
	print '<a href="./kaiin_login/kaiin_login.html">ログイン画面へ</a>';
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php

$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];

$sql = '
select 
	ot.code,
	ot.date,
	ot.code_member,
	ot.name as ot_name,
	ot.email,
	ot.postal1,
	ot.postal2,
	ot.address,
	ot.tel,
	mp.name as mst_name,
	opt.code_product,
	opt.price,
	opt.quantity
from
	order_tbl ot,
	order_product_tbl opt,
	mst_product mp
where
	ot.code = opt.code and
	opt.code_product = mp.code and 
	substr(ot.date, 1, 4) and 
	substr(ot.date, 6, 2) and 
	substr(ot.date, 9, 2)';

$stmt = $dbh->prepare($sql);
$data[] = $year;
$data[] = $month;
$data[] = $day;
$stmt->execute($data);

$dbh = null;

$csv = '注文コード,会員番号,お名前,メール,郵便番号,住所,TEL,商品コード,商品名,価格,数量';
$csv .= "\n";

while (true) {
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($rec == false) {
		break;
	}

	$csv .= $rec['code'];
	$csv .= ',';
	$csv .= $rec['code'];
	$csv .= $rec['code'];
	$csv .= $rec['code'];
	$csv .= $rec['code'];
	$csv .= $rec['code'];
	$csv .= $rec['code'];
	$csv .= $rec['code'];

}



?>