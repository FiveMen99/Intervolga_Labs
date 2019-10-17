<?php
include ("func.php");

$b =$_POST['text'];
$g=safety_request($b);
echo $g;

 $user='nikita062499';
  $password=12345;
 
  $pdo = new PDO("mysql:dbname=mybase;host=localhost",$user,$password);
  //$sql="INSERT INTO class (date,matematics,russich) VALUES ('06.09.2019','5','4')";
 // $rs =$pdo->query($sql);
$id=5;
$login=4;

$st = $pdo->prepare('SELECT * FROM $user WHERE matematics=? AND russich=?');

$st->execute([$id,$login]);


  ?>