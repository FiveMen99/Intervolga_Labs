<?php
function readbyidstud($pdo,$idstud)//result
{
    $result = $pdo->prepare('SELECT * FROM `assessments` WHERE idstud=:idstud');
    $result->execute(array('idstud' => $idstud));
    return $result;
}
function readbyfull($pdo,$idstud,$idsub,$mass,$k)
{
    $result = $pdo->prepare('SELECT * FROM `assessments` WHERE idstud=:idstud AND idsub=:idsub AND date=:date');
    $result->execute(array('idstud' => $idstud, 'idsub' => $idsub, 'date' => $mass[$k]));
    return $result;
}
function create1($pdo,$date,$idstud,$select,$assessments)
{
    $result = $pdo->prepare('INSERT INTO `assessments` (`id`, `date`, `idstud`, `idsub`, `assessments`) VALUES (NULL, :date, :idstud, :select, :assessments)');
    $result->execute(array('date' => $date,'idstud'=>$idstud, 'select'=>$select, 'assessments'=>$assessments));
}
function delete1($pdo,$date,$select,$idstud)
{
    $result = $pdo->prepare('DELETE FROM `assessments` WHERE date=:date AND idsub=:select AND idstud=:idstud');
    $result->execute(array('date' => $date,'select'=>$select, 'idstud'=>$idstud));
}
function update1($pdo,$date,$idstud,$select,$assessments)
{
    $result = $pdo->prepare('UPDATE `assessments` SET assessments=:assessments WHERE idstud=:idstud AND idsub=:select AND date=:date');
    $result->execute(array('date' => $date,'idstud'=>$idstud, 'select'=>$select, 'assessments'=>$assessments));
}