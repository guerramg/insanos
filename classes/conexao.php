<?php

date_default_timezone_set('America/Sao_Paulo');

$host = 'localhost';
$usuario = 'root';
$senha  =   '';
$base   =   'insanos';

try
{
    $conector = new PDO('mysql:host='.$host.';dbname='.$base.'', $usuario, $senha);
    $conector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    print 'ERROR: ' . $e->getMessage();
}

?>
