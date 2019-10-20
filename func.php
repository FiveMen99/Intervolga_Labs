<?php
function safety_request ($a){
$a=htmlspecialchars($a);//можно было добавить real_escape_string (и функция была бы немного больше), но в лекции сказано делать по другому
return $a;;	
	}













?>


