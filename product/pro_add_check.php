<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
$pro_name = $_POST['name'];
$pro_price = $_POST['price'];

$pro_name = htmlspecialchars($pro_name);

$ok_flag = true;

if ($pro_name == '') {
	print '商品名が入力されていません<br>';
	$ok_flag = false;
} else {
	print '商品名：　' . $pro_name . '<br>';
}

if (preg_match(/^\d+$/, $pro_price) == 0) {
	print '価格が正しく入力されていません<br>';
	$ok_flag = false;
} else {
	print '価格：　' . $pro_price . '<br>';
}

if (!$ok_flag) {
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
} else {
	print '<form method="post" action="pro_add_done.php">';
	print '<input type="hidden" name="name" value="' . $pro_name . '">';
	print '<input type="hidden" name="price" value="' . $pro_price . '">';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="OK">';
	print '</form>';
}

?>
</body>
</html>

