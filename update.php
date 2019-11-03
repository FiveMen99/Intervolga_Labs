<?php
include("bd.php");
$id =@$_POST['select'];

$surname =@$_POST['surname'];
$name =@$_POST['name'];
$lastname =@$_POST['lastname'];
$stmt = $pdo->prepare('UPDATE `students` SET surname=:surname,name=:name,lastname=:lastname WHERE idstud=:id');
$stmt->execute(array('id' => $id,'surname'=>$surname,'name'=>$name,'lastname'=>$lastname));

header("Location: lcab.php");
?>