<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
$select=$_POST['select'];
$assessments=$_POST['assessments'];
$date=$_POST['date'];
$idstud=$_COOKIE['idstud'];
$check=validation($date,'date');
$result=readbyidstud($pdo,$idstud);
$row = $result->fetch(PDO::FETCH_ASSOC);
if(!empty($row))
{
    if ($check)
    {
        update1($pdo, $date, $idstud, $select, $assessments);
        header("Location: /laba/assessments.php?idstud=$idstud");
    } else
    {
        header("Location: /laba/assessments.php?idstud=$idstud&error=2");
    }
}
else header("Location: /laba/assessments.php?idstud=$idstud&error=1");
?>
