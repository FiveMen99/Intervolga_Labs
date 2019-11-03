<?php
include ("bd.php");
$result = $pdo->query('SELECT * FROM students');
 while($row=$result->fetch(PDO::FETCH_ASSOC))
  {  
    $idstud=$row['idstud'];
    $name=$row['name'];
    $surname=$row['surname'];
    $lastname=$row['lastname'];
    echo '<a href="lcabtable.php?idstud='.$idstud.'">'.$surname.' '.$name.' '.$lastname.'</a>';
    
    
    echo '<br></br>';
   }
  echo' <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  Изменить
</button>

 <form action="update.php" method="post" class="form-signin">

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Изменить ФИО у ученика</h4>
      </div>
      <div class="modal-body">
        <select name="select" >';
        $result = $pdo->query('SELECT * FROM students');
        while($row=$result->fetch(PDO::FETCH_ASSOC))
  		{  
    	$idstud=$row['idstud'];
    	$name=$row['name'];
    	$surname=$row['surname'];
    	$lastname=$row['lastname'];
    	echo '<option value='.$idstud.'">'.$surname.' '.$name.' '.$lastname.'</a>';
   		}
        echo '
      </select>
    
      <input type="text" name="surname" class="form-control" placeholder="Новая Фамилия">
    
    
      <input type="text" name="name" class="form-control" placeholder="Новое Имя" >
    
   
      <input type="text" name="lastname" class="form-control" placeholder="Новое Отчество" >
      
  

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button class="btn btn-primary" id="btn_click">Изменить</button></div></div></div></div></form>';


        echo' <button type="button" class="btn btn-primary margin " data-toggle="modal" data-target="#myModal1">
  Добавить
</button>

 <form action="create.php" method="post" class="form-signin">

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

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
      <input type="text" name="namec" class="form-control" placeholder="Имя">
    </div>
    <div class="form-label-groupc">
      <input type="text" name="lastnamec" class="form-control" placeholder="Отчество" >
      
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button class="btn btn-primary" id="btn_click">Добавить</button></div></div></div></div></form>';

     echo' <button type="button" class="btn btn-primary margin" data-toggle="modal" data-target="#myModal2">
  Удалить
</button>

 <form action="delete.php" method="post" class="form-signin">

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Удалить ученика</h4>
      </div>
      <div class="modal-body">
        <select name="select" >';
        $result = $pdo->query('SELECT * FROM students');
        while($row=$result->fetch(PDO::FETCH_ASSOC))
  		{  
    	$idstud=$row['idstud'];
    	$name=$row['name'];
    	$surname=$row['surname'];
    	$lastname=$row['lastname'];
    	echo '<option value='.$idstud.'">'.$surname.' '.$name.' '.$lastname.'</a>';
   		}
        echo '
      </select>
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button class="btn btn-primary" id="btn_click">Удалить</button></div></div></div></div></form>';

?>