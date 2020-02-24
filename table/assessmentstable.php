<?php
class assessment
{
    function readbyidstud($pdo,$idstud)//result
    {
        $result = $pdo->prepare('SELECT * FROM `assessments` WHERE idstud=:idstud');
        $result->execute(array('idstud' => $idstud));
        return $result;
    }

    function readbyfull($pdo,$idstud,$idsub,$date)
    {
        $result = $pdo->prepare('SELECT * FROM `assessments` WHERE idstud=:idstud AND idsub=:idsub AND date=:date');
        $result->execute(array('idstud' => $idstud, 'idsub' => $idsub, 'date' => $date));
        return $result;
    }
    function create($pdo,$date,$idstud,$select,$assessments)
    {
        $result = $pdo->prepare('INSERT INTO `assessments` (`id`, `date`, `idstud`, `idsub`, `assessments`) VALUES (NULL, :date, :idstud, :select, :assessments)');
        $result->execute(array('date' => $date,'idstud'=>$idstud, 'select'=>$select, 'assessments'=>$assessments));
    }
    function delete($pdo,$id)
    {
        $result = $pdo->prepare('DELETE FROM `assessments` WHERE id=:id');
        $result->execute(array('id' => $id));
    }
    function update($pdo,$assessments,$id)
    {
        $result = $pdo->prepare('UPDATE `assessments` SET assessments=:assessments WHERE id=:id');
        $result->execute(array('assessments'=>$assessments,'id'=>$id));
    }
}