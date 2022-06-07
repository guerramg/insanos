<?php

$url = explode('/', $_SERVER['REQUEST_URI']);
$caminho = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$url[1];


include 'funcoesClass.php';
include 'divisoesClass.php';
include 'usuariosClass.php';

?>