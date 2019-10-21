
<?php
include("bd.php");
$postdannyy=@$_POST;
  //echo $postdannyy['russich'];

  if(@$_POST['date']!='' and @$_POST['matematics']!='' and @$_POST['matematics']!='' ){
  $sql = 'INSERT INTO class(date,matematics,russich) VALUES(:date,:matematics,:russich)';
$params= ['date' => @$postdannyy['date'], 'matematics' => @$postdannyy['matematics'], 'russich'=>@$postdannyy['russich']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
}
 header("Location: /laba/lcab.php");

?>