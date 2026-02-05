<?php
$password = "123456";  // the password you want to give the lecturer
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
?>
