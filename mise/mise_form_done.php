<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php

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

?>

</body>
</html>