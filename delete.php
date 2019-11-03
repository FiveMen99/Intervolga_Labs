<?php
include("bd.php");
$id =@$_POST['select'];
$stmt = $pdo->prepare('DELETE FROM `students` WHERE idstud=:id
');
$stmt->execute(array('id' => $id));
header("Location: lcab.php");
?>