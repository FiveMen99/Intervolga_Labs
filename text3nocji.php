<?php
include ("func.php");
include ("bd.php");
$b =$_POST['text'];
$g=safety_request($b);
echo $g;


$id=5;
$login=4;
$date='01.08.2019';


$sql = 'INSERT INTO class(date,matematics,russich) VALUES(:date,:matematics,:russich)';
$params= ['date' => $date, 'matematics' => $id, 'russich'=>$login];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);

  ?>

