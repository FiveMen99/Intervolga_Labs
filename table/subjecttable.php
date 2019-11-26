<?php
function read1 ($pdo)
{
    $result = $pdo->query('SELECT * FROM subject');
    return $result;
}
function countsubject($pdo)
{
    $result = $pdo->query('SELECT * FROM subject');
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    $length=count($row);
    return $length;
}
function readbyidsub($pdo,$idsub)//result1
{
    $result = $pdo->prepare('SELECT * FROM `subject` WHERE idsub=:idsub');
    $result->execute(array('idsub' => $idsub));
    return $result;
}