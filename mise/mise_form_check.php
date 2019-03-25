<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mise_form_check</title>
</head>
<body>
<?php

require_once('../common/common.php');

$post = sanitize($_POST);
var_dump($post);
$onamae = $post['onamae'];
$email = $post['email'];
$postal1 = $post['postal1'];
$postal2 = $post['postal2'];
$address = $post['address'];
$tel = $post['tel'];

$ok_flg = true;
if ($onamae == '') {
	print 'お名前が入力されていません。<br><br>';
	$ok_flg = false;
}

if (preg_match('/^[\.-\w]+@[\.-\w]+\.([a-z]+)$/', $email) == 0) {
	print 'メールアドレスを正確に入力してください。<br><br>';
	$ok_flg = false;
}

if (preg_match('/^[0-9]+$/', $postal1) == 0) {
	print '郵便番号は半角数字で入力してください。<br><br>';
	$ok_flg = false;
}

if (preg_match('/^[0-9]+$/', $postal2) == 0) {
	print '郵便番号は半角数字で入力してください。<br><br>';
	$ok_flg = false;
}

if ($address == '') {
	print '住所が入力されていません。<br><br>';
	$ok_flg = false;
}

if (preg_match('/^\d{2,5}-?\d{2,5}-?\d{4,5}$/', $tel) == 0) {
	print '電話番号を正確に入力してください。<br><br>';
	$ok_flg = false;
}

if ($ok_flg === true) {
	print '<form action="mise_form_done.php" method="post">';
	print '<input type="hidden" name="onamae" value="'. $onamae .'">';
	print '<input type="hidden" name="email" value="'. $email .'">';
	print '<input type="hidden" name="postal1" value="'. $postal1 .'">';
	print '<input type="hidden" name="postal2" value="'. $postal2 .'">';
	print '<input type="hidden" name="address" value="'. $address .'">';
	print '<input type="hidden" name="tel" value="'. $tel .'">';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="OK"><br>';
	print '</form>';
} else {
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}

?>
</body>
</html>