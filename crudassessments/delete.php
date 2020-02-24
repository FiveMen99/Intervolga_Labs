<?php
include_once $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$id=$_POST['id'];
$idstud=$_POST['idstud'];
$assessments=new assessment();
$assessments->delete($pdo,$id);
//include_once $_SERVER['DOCUMENT_ROOT']."/laba/crudassessments/read.php";
?>