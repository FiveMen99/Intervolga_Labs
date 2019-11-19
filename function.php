<?php
include_once("table/studentstable.php");
include_once("table/subjecttable.php");
include_once("table/assessmentstable.php");
function selectstudent ($result)
{
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        $idstud = $row['idstud'];
        $name = $row['name'];
        $surname = $row['surname'];
        $lastname = $row['lastname'];
        echo '<option value=' . $idstud . '">' . $surname . ' ' . $name . ' ' . $lastname . '</a>';
    }
}
function checkonadmin($isadmin)
{
    if($isadmin)
    {
        echo '
    <table>
    <tr>
      <th>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Добавить</button>
      </th>
      <th>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal1">Изменить</button>
      </th>
      <th>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal2">Удалить</button>
      </th>
    </tr>
    </table>';
    }
}
function selectsubject($result)
{
    $i=1;
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        $subject=$row['name'];
        echo '<option value='.$i.'">'.$subject.'</a>';
        $i=$i+1;
    }
}

