<?php
$driver='mysql';
$host='localhost';
$db_name='mybase';
$user='nikita06249';
$password=123;
$charset='utf8';
$options= [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try
{
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $user, $password, $options);
}
catch(PDOException $e)
{
    die("не могу");
}
$pdo->prepare('SET NAMES utf8')->execute();
?>