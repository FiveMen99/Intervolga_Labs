<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
$select=$_POST['select'];
$assessments=$_POST['assessments'];
$date=$_POST['date'];
$idstud=$_COOKIE['idstud'];
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
