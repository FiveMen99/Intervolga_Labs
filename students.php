<?php
require_once("authorizationcheck.php");
include("bd.php");
include_once("table/studentstable.php");
include_once("crudstudents/read.php");
include_once("function.php");
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Ничего, кроме основ: скомпилированный CSS и JavaScript.">
    <title>Учителя- это наше все</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="css/style1.css" >
  </head>
  <body>
<?php
   include("header.php");
?>
<main role="main">
 <style>
	body { background: url(https://avatars.mds.yandex.net/get-altay/374295/2a0000015b16005ac30831ecf6ee93a1e0fb/orig)no-repeat;
background-size: 100%;	}
      .bd-placeholder-img 
      {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg 
        {
          font-size: 3.5rem;
        }
      }
    </style>
  <section class="jumbotron text-center">
    <div class="container-fluid">
      <h1 class="jumbotron-heading  mt-5">МОУ Лицей №9</h1>
      <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
      <a>Добро пожаловать пользователь под именем</a>
    </div>
      <?php
      checkonadmin($_SESSION['isadmin']);
      printtable($pdo);
      if ((@$_GET['error'])==1)
      {
         echo '<div id="errors" style="color:red;">Данные об этом пользователе были уже удалены</div><hr>';
      }
      if ((@$_GET['error'])==2)
      {
          echo '<div id="errors" style="color:red;">Проверьте валидность данных</div><hr>';
      }
      ?>
      <form action="crudstudents/update.php" method="post" class="form-signin" enctype="multipart/form-data">
          <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Изменить ФИО у ученика</h4>
                      </div>
                      <div class="modal-body">
                          <select name="select" >
                              <?php
                              $result=read($pdo);
                              selectstudent($result);
                              ?>
                          </select>
                          <input type="text" name="surname" class="form-control margin" placeholder="Новая Фамилия" id="surname1">
                          <input type="text" name="name" class="form-control margin" placeholder="Новое Имя" id="name1" >
                          <input type="text" name="lastname" class="form-control margin" placeholder="Новое Отчество" id="lastname1">
                          <input type="text" name="class" class="form-control margin" placeholder="Новый Класс" id="class1">
                          <input class="margin" name="myfile" placeholder="Файл" type="file" id="file1">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                          <button class="btn btn-primary" id="button1">Изменить</button>
                      </div>

                  </div>
              </div>
          </div>
      </form>
      <form action="crudstudents/create.php" method="post" class="form-signin" enctype="multipart/form-data">
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Добавить нового ученика</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form-label-group margin">
                              <input type="text" name="surnamec" class="form-control" placeholder="Фамилия" id="surname">
                          </div>
                          <div class="form-label-group">
                              <input type="text" name="namec" class="form-control margin" placeholder="Имя" id="name">
                          </div>
                          <div class="form-label-groupc">
                              <input type="text" name="lastnamec" class="form-control margin" placeholder="Отчество" id="lastname" >
                          </div>
                          <div class="form-label-groupc">
                              <input type="text" name="classc" class="form-control margin" placeholder="Класс" id="class">
                          </div>

                              <input class="margin" name="myfile" placeholder="Файл" type="file">

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                          <button class="btn btn-primary" id="button">Добавить</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
      <form action="crudstudents/delete.php" method="post" class="form-signin">
          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Удалить ученика</h4>
                      </div>
                      <div class="modal-body">
                          <select name="select" >';
                              <?php
                              $result=read($pdo);
                              selectstudent($result);
                              ?>
                          </select>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                          <button class="btn btn-primary" id="btn_click">Удалить</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  </section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/laba/js/validation/fioc.js"></script>
<script src="/laba/js/validation/fioc1.js"></script>
</body>
</html>
