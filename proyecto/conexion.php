<?php
$link = 'mysql:host=localhost;dbname=probando';
$user = "root";
$password = "hipogoku1129";



try{
    $pdo = new PDO($link, $user, $password);    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>