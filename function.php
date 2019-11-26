<?php
include_once("table/studentstable.php");
include_once("table/subjecttable.php");
include_once("table/assessmentstable.php");
function checkonadmin($isadmin)//проверка на админа
{
    if($isadmin)
    {
        return 1;
    }
    else return 0;
}
function selectsubject($result)//получение всех предметом и вывод их в селекте
{
    $i=1;
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        $subject=$row['name'];
        echo '<option value='.$i.'">'.$subject.'</a>';
        $i=$i+1;
    }
}
function sort_date($a_new, $b_new) {
    $a_new = strtotime($a_new);
    $b_new = strtotime($b_new);
    return $a_new - $b_new;
}
function getmysubject($pdo)//Предметы ученика в массиве
{
    $result=read1($pdo);
    $i=0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $mass[$i] = $row['name'];
        $i++;
    }
    return $mass;
}
function getmydate($pdo,$idstud)//на вход id stud на выходе все даты, на которых он получал оценки
{
    $result=readbyidstud($pdo,$idstud);
    $i=0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $mass[$i] = $row['date'];
        $i++;
    }
    if (!empty($mass))
    {
        $mass = array_unique($mass);
        usort($mass, "sort_date");
        return $mass;
    }


}
