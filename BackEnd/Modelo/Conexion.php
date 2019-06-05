<?php
$link = 'mysql:host=localhost;dbname=bdrecursoshumanos';
$usuario = 'root';
$pass = '12345';
try{
    $pdo = new PDO($link,$usuario,$pass);
    
}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>