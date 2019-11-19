<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
$idstud =@$_POST['select'];
$surname =@$_POST['surname'];
$name =@$_POST['name'];
$lastname =@$_POST['lastname'];
$class=@$_POST['class'];
update($pdo,$idstud,$surname,$name,$lastname,$class);
header("Location: /laba/students.php");
?>