<?php
$_SESSION = array();
if (isset($_COOKIE[session_name()]) == true) {
	setcookie(session_name(), '', time()-42000, '/');
}
@session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>logout</title>
</head>
<body>
	ログアウトしました。<br>
	<a href="../kaiin_login/kaiin_login.html">ログイン画面へ</a>
</body>
</html>