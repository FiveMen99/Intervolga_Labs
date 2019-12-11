<?php
function subject_read ($pdo)
{
    $result = $pdo->query('SELECT * FROM subject');
    return $result;
}
function subject_readbyidsub($pdo,$idsub)
{
    $result = $pdo->prepare('SELECT * FROM `subject` WHERE idsub=:idsub');
    $result->execute(array('idsub' => $idsub));
    return $result;
}