<?php
$driver='mysql';
$host='localhost';
$db_name='mybase';

 $user='nikita062499';
  $password=12345;
  $charset='utf8';
  $options= [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

 try{
  $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $user, $password, $options);
    }
 catch(PDOException $e)
    {
 	die("не могу");
    }
?>