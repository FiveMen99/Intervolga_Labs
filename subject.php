<?php
$idstud=$_GET['idstud'];
$idsub=1;
include ("bd.php");
  //делаем таблицу
echo'<table>';
$amount=3;


while($idsub<=$amount)
{
   	$result = $pdo->query('SELECT * FROM `assessments` WHERE idstud='.$idstud.' AND idsub='.$idsub.'');
    $result1 = $pdo->query('SELECT * FROM `subject` WHERE idsub='.$idsub.'');
   	$row1=$result1->fetch(PDO::FETCH_ASSOC);
  	echo '<tr><th>'.$row1['name'].'</th>';
   	while($row=$result->fetch(PDO::FETCH_ASSOC))
   	{
     	echo '<th>'.$row['assessments'].'</th>';
  	}
     echo'</tr>';
     $idsub+=1;
}     
echo'</table>';
?>