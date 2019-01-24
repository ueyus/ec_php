<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
$kaiin_name = $_POST['name'];
$kaiin_pass1 = $_POST['password1'];
$kaiin_pass2 = $_POST['password2'];

$kaiin_name = htmlspecialchars($kaiin_name);

$ok_flag = true;

if ($kaiin_name == '') {
	print '名前が入力されていません<br>';
	$ok_flag = false;
} else {
	print '会員名：　' . $kaiin_name . '<br>';
}

if ($kaiin_pass1 == '') {
	print 'パスワードが入力されていません<br>';
	$ok_flag = false;
} else if ($kaiin_pass1 !== $kaiin_pass2) {
	print 'パスワードが一致しません<br>';
	$ok_flag = false;
}

if (!$ok_flag) {
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
} else {
	$kaiin_pass = md5($kaiin_pass1);
	print '<form method="post" action="kaiin_add_done.php">';
	print '<input type="hidden" name="name" value="' . $kaiin_name . '">';
	print '<input type="hidden" name="password" value="' . $kaiin_pass . '">';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="OK">';
	print '</form>';
}

?>
</body>
</html>

