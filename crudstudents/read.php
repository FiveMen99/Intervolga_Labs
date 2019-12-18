<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$students=new students();
$result=$students->readsortclass($pdo);//Получаем данные
$error=safetyrequest($pdo,@$_GET['error']);
if(session_id() == '') {
    session_start();
}
if(!empty($_SESSION['id']))
{
    printtable($pdo,$result);
}
else
{
    include $_SERVER['DOCUMENT_ROOT']."/laba/authorization.php";
}
function printtable($pdo,$result)
{
    $i=0;
    while($row=$result->fetch(PDO::FETCH_ASSOC))//цикл вывода таблицы
    {
        echo '<form enctype="multipart/form-data" method="post" name="fileinfo'.$i.'">
                  <div class="modal fade" id="update'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Изменить ФИО у ученика</h4>
                              </div>
                              <div class="modal-body">
                                  <input type="text" name="surname" class="form-control margin" placeholder="Новая Фамилия">
                                  <input type="text" name="name" class="form-control margin" placeholder="Новое Имя">
                                  <input type="text" name="lastname" class="form-control margin" placeholder="Новое Отчество">
                                  <input type="text" name="class" class="form-control margin" placeholder="Новый Класс">
                                  <input class="margin" name="myfile" placeholder="Файл" type="file" id="file">
                                   <input type="hidden" name="idstud" value="'.$row['idstud'].'">
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                  <button class="btn btn-primary" id="button" type="submit" onclick="updatestudents('.$i.')" data-dismiss="modal">Изменить</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>';
        $i++;
    }
    echo '<div class="container">
              <h1 class="jumbotron-heading"">МОУ Лицей №9</h1>
              <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
            </div>
            <table class="margin">';
    if($_SESSION['isadmin']==1)
    {
        echo '
          <tr><th><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Добавить</button></th></tr>
      </table>
      <form enctype="multipart/form-data" method="post" name="fileinfoo">
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Добавить нового ученика</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form-label-group margin">
                              <input type="text" name="surnamec" class="form-control" placeholder="Фамилия">
                          </div>
                          <div class="form-label-group">
                              <input type="text" name="namec" class="form-control margin" placeholder="Имя">
                          </div>
                          <div class="form-label-groupc">
                              <input type="text" name="lastnamec" class="form-control margin" placeholder="Отчество">
                          </div>
                          <div class="form-label-groupc">
                              <input type="text" name="classc" class="form-control margin" placeholder="Класс">
                          </div>
                              <input class="margin" name="myfile" placeholder="Файл" type="file">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                          <button class="btn btn-primary" id="button" type="submit" onclick="createstudents()"  data-dismiss="modal">Добавить</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>';
    }
    $i=0;
    $students=new students();
    $result=$students->readsortclass($pdo);//Получаем данные
    echo '<table>';
    while($row=$result->fetch(PDO::FETCH_ASSOC))//цикл вывода таблицы
    {
        echo '<tr>
               <!-- Поле Класс -->
              <th>' . $row['class'] . '</th>
               <!-- Кнопка ФИО -->
              <th><a href="" onclick="readassessments('.$row['idstud'].');event.preventDefault();">' . $row['surname'] . ' ' . $row['name'] . ' ' . $row['lastname'] . '</a></th>
              <!-- Кнопка Фото -->
              <th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#foto'.$i.'">Фото</button></th>
              <div class="modal fade" id="foto'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="/laba/'.$row['file'].'" class="m-auto m-5" width="200">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                        </div>
                    </div>
              </div>';
              //<!-- Кнопка изменить -->

        if($_SESSION['isadmin']==1)
        {
            echo '<th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#update'.$i.'">Изменить</button></th>';
              echo '
              <!-- Кнопка удаления -->
              <th><button class="btn btn-primary p-1" onclick="deletestudents('.$row['idstud'].')">Удалить</button></th>          
              </tr>              
              ';
        }
        $i++;
    }
    echo '
<div class="alert alert-danger margin block p-2" id="error">
</div>
   ';
}
