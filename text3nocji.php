<?php
include ("func.php");
include ("bd.php");
$b =$_POST['text'];
$g=safety_request($b);
echo $g;
  ?>

