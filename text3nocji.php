<?php
include ("func.php");
include ("bd.php");
$b =$_POST['text'];
$g=safety_request($b);
echo $g;


$id=5;
$login=4;

$st = $pdo->prepare('SELECT * FROM $user WHERE matematics=? AND russich=?');
$st->execute([$id,$login]);


  ?>

