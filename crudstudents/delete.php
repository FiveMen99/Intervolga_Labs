<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/crudstudents/read.php";
$idstud=$_POST['idstud'];
$students=new students();
$result=$students->readbyidstud($pdo,$idstud);
$row=$result->fetch(PDO::FETCH_ASSOC);
define("UPLOAD_DIR", $_SERVER['DOCUMENT_ROOT']."/laba/");
$link=$row['file'];
$name=UPLOAD_DIR.$link;
unlink("$name");
$students->delete($pdo,$idstud);
?>