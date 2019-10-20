<?php
 $user='nikita062499';
  $password=12345;
 
  $pdo = new PDO("mysql:dbname=mybase;host=localhost",$user,$password);
  if($pdo){echo "vrode podlicilicy k bd";}
  	else echo "chet ne to";

?>