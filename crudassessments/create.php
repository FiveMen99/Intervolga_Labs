<?php
include_once $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
//include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$select=safetyrequest($pdo,$_POST['select']);
$assessmentsnumber=safetyrequest($pdo,$_POST['assessments']);
$date=safetyrequest($pdo,$_POST['date']);
$idstud=safetyrequest($pdo,$_POST['idstud']);
//$check=validation($date,'date');
$check=1;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($check)
    {
        $assessments1=new assessment();
        $assessments1->create($pdo, $date, $idstud, $select, $assessmentsnumber);
        include_once $_SERVER['DOCUMENT_ROOT']."/laba/crudassessments/read.php";

    } else
    {
        echo "error";
    }
}
?>
