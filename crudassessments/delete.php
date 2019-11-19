<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
$select=$_POST['select'];
$date=$_POST['date'];
$idstud=$_COOKIE['idstud'];
delete1($pdo,$date,$select,$idstud);
header("Location: /laba/assessments.php?idstud=$idstud");
?>