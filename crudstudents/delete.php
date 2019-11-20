<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
$idstud =@$_POST['select'];
$result=readbyidstud1($pdo,$idstud);
$row=$result->fetch(PDO::FETCH_ASSOC);
define("UPLOAD_DIR", $_SERVER['DOCUMENT_ROOT']."/laba/");
$link=$row['file'];
$name=UPLOAD_DIR.$link;
unlink("$name");
delete($pdo,$idstud);
header("Location: /laba/students.php");
?>