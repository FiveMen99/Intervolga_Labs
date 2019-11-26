<?php
include_once("bd.php");
include_once("table/namecomandsinsqltable.php");
function safetyrequest($pdo,$request)
{
    $result=readwords($pdo);
    $arrayofhtmltag=['&','<','>'];
    $arraytrueofhtmltag=['&amp','&lt','&gt'];
    while ($row = $result->fetch(PDO::FETCH_ASSOC))//Если находим ключевое слово SQL делаем пробел
    {
        $word=$row['comand'];
        $truewords=substr_replace($word, ' ', 2,0);
        $request=str_replace($word,$truewords,$request);
    }
    $request=str_replace('\'','\\\'',$request);//безопасный js
    $request=str_replace($arrayofhtmltag,$arraytrueofhtmltag,$request);//экранирование html тегов

    return $request;
}
//// Проверка js инъекции
//$r='\'); var x = 3+5; alert("Я поломал твой код" + x); alert(\'';
//$r=safetyrequest($pdo,$r);
//$code='<script>alert(\''.$r.'\')</script>';
//echo $code;
//// Проверка html экранирования
//$test='&lt;<div class="container">
//      <h1 ” class="jumbotron-heading  mt-4">МОУ Лицей №9</h1>
//      <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
//    </div>';
//$test=safetyrequest($pdo,$test);
//echo $test;
//
////Проверка SQL
//$test='ЛАлалалаалалл SELECT мсчстмсчтмсчтчсмт CREATE';
//$test=safetyrequest($pdo,$test);
//echo $test;

