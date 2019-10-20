<?php
$a =@$_POST['login'];
$b =@$_POST['parol'];

include("func.php");
$a=safety_request($a);
$b=safety_request($b);


$mass = array('login' => 'nikita062499',
                  'parol' => '123');



$fd = fopen("test.txt", 'w') or die("не удалось создать файл");
$str = md5($b);

fwrite($fd, $str);
	
		if($a!=$mass['login'] or $b!=$mass['parol'])
        	 header("Location: /laba/ohibka.php");
        	
        

 		if($a==$mass['login'] and $b==$mass['parol'])
 		{
 		setcookie("login", $a);
		setcookie("parol", md5($b));
 			//setcookie("parol", $b);			
		header("Location: /laba/lcab.php");
		
		}
		
	fclose($fd);
?>
