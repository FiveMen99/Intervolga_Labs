<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$subject=safetyrequest($pdo,$_GET['subject']);
$assessments=safetyrequest($pdo,$_POST['assessments']);
$date=safetyrequest($pdo,$_GET['date']);
$idstud=safetyrequest($pdo,$_GET['idstud']);
$check=validation($date,'date');
$result=readbyfull($pdo,$idstud,$subject,$date);
$row = $result->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($row))
    {
        if ($check)
        {
            update1($pdo, $date, $idstud, $subject, $assessments);
            header("Location: /laba/assessments.php?idstud=$idstud");
        } else
        {
            header("Location: /laba/assessments.php?idstud=$idstud&error=2");
            return 0;
        }
    } else
    {
        header("Location: /laba/assessments.php?idstud=$idstud&error=1");
        return 0;
    }
}
else header("Location: /laba/assessments.php?idstud=$idstud&error=3");
return 0;
?>
