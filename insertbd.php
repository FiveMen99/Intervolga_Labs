
<?php
include("bd.php");
include("func.php");
$postdannyy=@$_POST;
$postdannyy['date']=safety_request($postdannyy['date']);
$postdannyy['matematics']=safety_request($postdannyy['matematics']);
$postdannyy['russich']=safety_request($postdannyy['russich']);
$postdannyy['history']=safety_request($postdannyy['history']);
	$dlinadata=strlen($postdannyy['date']);
	$dlinamatan=strlen($postdannyy['matematics']);
	$dlinaruss=strlen($postdannyy['russich']);
	$dlinahist=strlen($postdannyy['history']);
		
//первый if на пустое
if(@$postdannyy['date']!='' and @$postdannyy['matematics']!='' and @$postdannyy['matematics']!='' and @$postdannyy['history']!='' )
{

//втрой if на длину и необходимые точки в date
	if($postdannyy['date'][2]=='.' and $postdannyy['date'][5]=='.' and $dlinadata<=10 and $dlinamatan==1 and $dlinaruss==1 and $dlinahist==1 )
	{
//третий if проверка на числа
		if(is_numeric($postdannyy['date'][0])==1 and is_numeric($postdannyy['date'][1])==1 and is_numeric($postdannyy['date'][3])==1 and is_numeric($postdannyy['date'][4])==1 and is_numeric($postdannyy['date'][6])==1 and is_numeric($postdannyy['date'][7])==1 and is_numeric($postdannyy['date'][8])==1 and is_numeric($postdannyy['date'][9])==1 and is_numeric($postdannyy['matematics'][0])==1 and is_numeric($postdannyy['russich'][0])==1 and is_numeric($postdannyy['history'][0])==1)
		{


//добавление sql запросом в базу данных
$sql = 'INSERT INTO class(date,matematics,russich,history) VALUES(:date,:matematics,:russich,:history)';
$params= ['date' => @$postdannyy['date'], 'matematics' => @$postdannyy['matematics'], 'russich'=>@$postdannyy['russich'],'history'=>@$postdannyy['history']];
$stmt=$pdo->prepare($sql);
$stmt->execute($params);
}
	}
		}
 header("Location: /laba/lcab.php");

?>