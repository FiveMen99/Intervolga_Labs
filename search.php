<?php
include_once("table/studentstable.php");
include_once ("bd.php");
$students=new students();
$search='%' . @$_POST['search'] . '%';
echo '<table border="1">';
function searchstudents($pdo,$checkfioc,$result)
{

    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row))
    {
        if ($checkfioc == 0)
        {
            echo "<tr><th>Класс</th><th>ФИО</th><th>Фото</th>";
            $checkfioc = 1;
        }
        $length = count($row);
        for ($i = 0; $i < $length; $i++)
        {
            echo '<tr>
               <!-- Поле Класс -->
              <th>' . $row[$i]['class'] . '</th>
               <!-- Кнопка ФИО -->
              <th><a href="" onclick="ajaxreadassessments('.$row[$i]['idstud'].');event.preventDefault();">' . $row[$i]['surname'] . ' ' . $row[$i]['name'] . ' ' . $row[$i]['lastname'] . '</a></th>
              <!-- Кнопка Фото -->
              <th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#foto' . $i . '">Фото</button></th>
              <div class="modal fade" id="foto' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="/laba/' . $row[$i]['file'] . '" class="m-auto m-5" width="200">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                        </div>
                    </div>
              </div>
              </tr>';
        }

    }
    return $checkfioc;
}
function searchassesments($pdo,$checkdas,$result)
{
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row))
    {
        if ($checkdas == 0)
        {
            echo "<tr><th>Класс</th><th>ФИО</th><th>Фото</th><th>Дата</th><th>Предмет</th><th>Оценка</th>";
            $checkdas = 1;
        }
        $length = count($row);
        for ($i = 0; $i < $length; $i++)
        {
            echo '<tr>
               <!-- Поле Класс -->
              <th>' . $row[$i]['class'] . '</th>
               <!-- Кнопка ФИО -->
              <th><a href="#assessments" onclick="ajaxreadassessments('.$row[$i]['idstud'].');event.preventDefault();">' . $row[$i]['surname'] . ' ' . $row[$i]['name'] . ' ' . $row[$i]['lastname'] . '</a></th>
              <!-- Кнопка Фото -->
              <th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#foto' . $i . '">Фото</button></th>
              <th>' . $row[$i]['date'] . '</th>
              <th>' . $row[$i]['subname'] . '</th>
              <th>' . $row[$i]['assessments'] . '</th>
              <div class="modal fade" id="foto' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="/laba/' . $row[$i]['file'] . '" class="m-auto m-5" width="200">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                        </div>
                    </div>
              </div>
              </tr>';
        }
    }
    return $checkdas;
}
function fioc($pdo,$search){//surname,name,lastname,class 1#keys
    $students=new students();
    $checkfioc=0;
    if(!empty($_POST['search']))
    {
        $result = $students->readsearchsurname($pdo, $search);//Поиск Фамилий
        $checkfioc = searchstudents($pdo, $checkfioc, $result);
        $result = $students->readsearchname($pdo, $search);//Поиск Имен
        $checkfioc = searchstudents($pdo, $checkfioc, $result);
        $result = $students->readsearchlastname($pdo, $search);//Поиск Отчеств
        $checkfioc = searchstudents($pdo, $checkfioc, $result);
        $result = $students->readsearchclass($pdo, $search);//Поиск классов
        $checkfioc = searchstudents($pdo, $checkfioc, $result);
    }
    return $checkfioc;
}
function das($pdo,$search)//date,assesments,subject 2#keys
{
    $checkdas = 0;
    if(!empty($_POST['search']))
    {
        $students = new students();
        $result = $students->readjoinassesmentsjoinsubjectsearchdate($pdo, @$_POST['search']);//поиск даты(только точное совпадение)
        $checkdas = searchassesments($pdo, $checkdas, $result);
        $result = $students->readjoinassesmentsjoinsubjectsearchsubject($pdo, $search);//поиск предметов
        $checkdas = searchassesments($pdo, $checkdas, $result);
        $result = $students->readjoinassesmentsjoinsubjectsearchassessments($pdo, $search);//Поиск оценок
        $checkdas = searchassesments($pdo, $checkdas, $result);
    }
    return $checkdas;
}
if(session_id() == '') {
    session_start();
}
if(!empty($_SESSION['id']))
{
    echo '<h1 class="jumbotron-heading margin" mt-4">МОУ Лицей №9</h1>
      <h5>Результаты поиска</h5>';
    $fiocresult = fioc($pdo, $search);
    $dasresult = das($pdo, $search);
    if($fiocresult==0 && $dasresult==0)
    {
        echo "<h3>Ничего не нашел</h3>";
    }
}
else
{
    include $_SERVER['DOCUMENT_ROOT']."/laba/authorization.php";

}