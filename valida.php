<?php

include 'classes/userLoginClass.php';

$user = new User();

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$user->login($email, $senha);

?>