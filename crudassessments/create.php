<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$select=safetyrequest($pdo,$_POST['select']);
$assessments=safetyrequest($pdo,$_POST['assessments']);
$date=safetyrequest($pdo,$_POST['date']);
$idstud=safetyrequest($pdo,$_GET['idstud']);
$check=validation($date,'date');

if($check)
{
    create1($pdo, $date, $idstud, $select, $assessments);
    header("Location: /laba/assessments.php?idstud=$idstud");
}
else
{

   header("Location: /laba/assessments.php?idstud=$idstud");
}
?>
