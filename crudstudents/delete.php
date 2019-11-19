<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
$idstud =@$_POST['select'];
$result=readbyidstud($pdo,$idstud);
$row=$result->fetch(PDO::FETCH_ASSOC);


//delete($pdo,$idstud);
//header("Location: /laba/students.php");
?>