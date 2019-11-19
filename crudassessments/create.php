<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
$select=$_POST['select'];
$assessments=$_POST['assessments'];
$date=$_POST['date'];
$idstud=$_COOKIE['idstud'];
create1($pdo,$date,$idstud,$select,$assessments);
header("Location: /laba/assessments.php?idstud=$idstud");
?>
