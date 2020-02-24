<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include_once $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/subjecttable.php";
$idstud=$_POST['idstud'];
if(session_id() == '') {
    session_start();
}
function sort_date($a_new, $b_new) {
    $a_new = strtotime($a_new);
    $b_new = strtotime($b_new);
    return $a_new - $b_new;
}
function selectsubject($result)//получение всех предметом и вывод их в селекте
{
    $i=1;
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {

        $subject=$row['subname'];
        echo '<option value='.$i.'>'.$subject.'</a>';//'.$subject.'
        $i=$i+1;
    }
}
function getmysubject($pdo)//Предметы ученика в массиве
{
    $subject=new subject();
    $result=$subject->read($pdo);
    $i=0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $mass[$i] = $row['subname'];
        $i++;
    }
    return $mass;
}
function getmydate($pdo,$idstud)//на вход id stud на выходе все даты, на которых он получал оценки
{
    $assessmets=new assessment();
    $result=$assessmets->readbyidstud($pdo,$idstud);
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
printtableassigment($pdo,$idstud);
function printtableassigment($pdo,$idstud)
{
    $assessments= new assessment();
    $date = getmydate($pdo, $idstud);
    $subject=getmysubject($pdo);
    if(!empty($date))
    {
        $lengthdate = count($date);
    }
    else $lengthdate=0;
    $lengthsubject=count($subject);
    $result=$assessments->readbyidstud($pdo,$idstud);
    //Цикл построения массива
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $idsubject=$row['idsub'];
        $i=0;
        while($i<$lengthdate)
        {
            if($date[$i]==$row['date'])
            {
                $iddate=$i;
            }
            $i++;
        }
        $mass[$idsubject][$iddate]=$row['assessments'];
        $id[$idsubject][$iddate]=$row['id'];
    }
    //Рисуем перввую горизонталь с датами
    echo '
            <div class="container">
              <h1 class="jumbotron-heading"">МОУ Лицей №9</h1>
              <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
            </div>
        ';
    if($_SESSION['isadmin']==1)
    {

        echo '
            <table>
                  <tr><th><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal1">Добавить</button></th></tr>
              </table>
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Добавить оценку</h4>
                    </div>
                    <div class="modal-body">
                        <select name="select" id="subject" class="form-control" >';
        $subjectname = new subject();
        $result = $subjectname->read($pdo);
        selectsubject($result);
        echo '
                        </select>
                        <select id="assessmets" class="form-control margin" >
                            <option value="5"><a>5</a></option>
                            <option value="4"><a>4</a></option>
                            <option value="3"><a>3</a></option>
                            <option value="2"><a>2</a></option>
                        </select>
                        <input type="text" class="form-control margin" id="date" name="date" placeholder="Дата" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button class="btn btn-primary" id="button" onclick="createassessments(' . $idstud . ')" data-dismiss="modal">Добавить</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo '
        <table>
            <tr>
                <th>Дата</th>';
    $i=0;
    while ($i < $lengthdate)
    {
        echo '<th>' . $date[$i] . '</th>';
        $i++;
    }
    echo '
                <th>Средняя оценка</th>
            </tr>';
    $i=0;
    while($i<$lengthsubject)
    {
        $idsub=$i+1;
        $summ = 0;
        $quantity = 0;
        echo '<tr><th>' . $subject[$i] . '</th>';
        $j=0;
        while($j<$lengthdate)
        {
            if(!empty($mass[$i+1][$j]))
            {
                //считаем средний балл
                if (is_numeric($mass[$i+1][$j]))
                {
                    $summ = $summ + $mass[$i+1][$j];
                    $quantity++;
                }
                //Если админ, то показываем Изменить и Удалить
                if($_SESSION['isadmin']==1)
                {
                        echo '
                    <th><a class="edit" data-toggle="modal" data-target="#my' . $i . 'm' . $j . '"><img src="/laba/uploads/edit.png"  width="8"></a>
                     <a class="center">' . $mass[$i + 1][$j] . '</a>    
                      <a href="##"  class="cross" onclick="deleteassessments('.$id[$i+1][$j].','.$idstud.')"><img src="/laba/uploads/cross.png"  width="8"></a></th>
                            <div class="modal fade" id="my' . $i . 'm' . $j . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Изменить оценку</h4>
                                        </div>
                                        <div class="modal-body">
                                            <select id="assessments'.$id[$i+1][$j].'" class="form-control margin" >
                                                 <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                            <button class="btn btn-primary" id="button1" onclick="updateassessments('.$id[$i+1][$j].','.$idstud.')" data-dismiss="modal">Изменить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                                  ';
                 }
                //Если не админ, то показываем оценку
                else
                {
                    echo '<th><a class="center">' . $mass[$i + 1][$j] . '</a></th>';
                }
            }
            //Если в массиве нет оценки выводим черточку
            else
            {
                echo '<th><a>-</a></th>';
            }
            $j++;
        }
        //Последний элеммент с средним баллом в горизонтале, если больше 4.5, то зеленым и.т.д
        if ($summ != 0)
        {
            $average = round($summ / $quantity, 2);
        }
        else $average = '-';
        if ($average >= 4.5)
        {
            echo '<th class="green">' . $average . '</th></tr>';
        }
        if ($average >= 3.5 and $average < 4.5)
        {
            echo '<th class="lightgreen">' . $average . '</th></tr>';
        }
        if ($average >= 2.5 and $average < 3.5)
        {
            echo '<th class="yellow">' . $average . '</th></tr>';
        }
        if ($average < 2.5 and $average >= 2)
        {
            echo '<th class="red">' . $average . '</th></tr>';
        }
        if ($average == '-')
        {
            echo '<th>' . $average . '</th></tr>';
        }
        $i++;
        echo '</tr>';
    }
    echo '</table>
    <button onclick="students()" class="btn btn-primary p-1">Назад</button>  
    <div id="error"></div>  ';
}
