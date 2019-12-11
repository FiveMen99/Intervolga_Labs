<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$idstud=safetyrequest($pdo,$_GET['idstud']);
$result=stud_readbyidstud($pdo,$idstud);
$row=$result->fetch(PDO::FETCH_ASSOC);
define("UPLOAD_DIR", $_SERVER['DOCUMENT_ROOT']."/laba/");
$link=$row['file'];
$name=UPLOAD_DIR.$link;
unlink("$name");
stud_delete($pdo,$idstud);
header("Location: /laba/students.php");
?>