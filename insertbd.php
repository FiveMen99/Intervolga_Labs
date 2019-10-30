
<?php
include("bd.php");
include("func.php");
$postinformation=@$_POST;
$postinformation['date']=safety_request($postinformation['date']);
$postinformation['matematics']=safety_request($postinformation['matematics']);
$postinformation['russich']=safety_request($postinformation['russich']);
$postinformation['history']=safety_request($postinformation['history']);
	$lengthdata=strlen($postinformation['date']);
	$lengthmatan=strlen($postinformation['matematics']);
	$lengthruss=strlen($postinformation['russich']);
	$lengthhist=strlen($postinformation['history']);
	$regular1='/([01-9])+\.([01-9])+\.([01-9]){4}/';
	$regular2='/([01-9]){1}/';	
//первый if на пустое
		$regulardata=preg_match($regular1, $postinformation['date']);
		$regularmatan=preg_match($regular2, $postinformation['date']);
		$regularruss=preg_match($regular2, $postinformation['date']);
		$regularhistory=preg_match($regular2, $postinformation['date']);

	if($regulardata==1 and $regularmatan==1 and $regularruss==1 and $regularhistory==1 and $lengthdata==10 and $lengthhist==1 and $lengthruss==1 and $lengthmatan==1)
	{
		//добавление sql запросом в базу данных
		$sql = 'INSERT INTO class(date,matematics,russich,history) VALUES(:date,:matematics,:russich,:history)';
		$params= ['date' => @$postinformation['date'], 'matematics' => @$postinformation['matematics'], 'russich'=>@$postinformation['russich'],'history'=>@$postinformation['history']];
		$stmt=$pdo->prepare($sql);
		$stmt->execute($params);
	}
 	header("Location: /laba/lcab.php");
?>