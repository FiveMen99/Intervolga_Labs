<?php
include("bd.php");
$surname =@$_POST['surnamec'];
$name =@$_POST['namec'];
$lastname =@$_POST['lastnamec'];
$stmt = $pdo->prepare('INSERT INTO `students` (`idstud`, `surname`, `name`, `lastname`) VALUES (NULL, :surname, :name, :lastname);');
$stmt->execute(array('surname'=>$surname,'name'=>$name,'lastname'=>$lastname));

header("Location: lcab.php");
?>