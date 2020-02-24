<?php
include_once $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$assessmentsnumber=$_POST['assessments'];
$id=$_POST['id'];

$assessments=new assessment();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $assessments->update($pdo, $assessmentsnumber,$id);
}
return 0;
?>
