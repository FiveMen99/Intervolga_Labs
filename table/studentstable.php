<?php
function read ($pdo)
{
    $result = $pdo->query('SELECT * FROM students');
    return $result;
}
function readsortclass($pdo)
{
    $result=$pdo->query('SELECT * FROM `students` ORDER BY `class`,`surname`,`name`,`lastname` DESC');
    return $result;
}
function readbyclass($pdo,$class)
{
    $result=$pdo->prepare('SELECT * FROM `students` WHERE class=:class');
    $result->execute(array('class' => $class));
    return $result;
}
function create($pdo,$surname,$name,$lastname,$class,$file)
{
    $stmt = $pdo->prepare('INSERT INTO `students` (`idstud`, `surname`, `name`, `lastname`,`class`,`file`) VALUES (NULL, :surname, :name, :lastname, :class,:file)');
    $stmt->execute(array('surname'=>$surname,'name'=>$name,'lastname'=>$lastname,'class'=>$class,'file'=>$file));
}
function delete($pdo,$idstud)
{
    $result = $pdo->prepare('DELETE FROM `students` WHERE idstud=:idstud');
    $result->execute(array('idstud' => $idstud));
}
function readbyidstud1($pdo,$idstud)
{
    $result = $pdo->prepare('SELECT * FROM `students` WHERE idstud=:idstud');
    $result->execute(array('idstud' => $idstud));
    return $result;
}
function update($pdo,$idstud,$surname,$name,$lastname,$class,$file)
{
    $result = $pdo->prepare('UPDATE `students` SET surname=:surname,name=:name,lastname=:lastname,class=:class,file=:file WHERE idstud=:id');
    $result->execute(array('id' => $idstud, 'surname' => $surname, 'name' => $name, 'lastname' => $lastname, 'class' => $class,'file'=>$file));
}
function readbyfull1($pdo,$surname,$name,$lastname,$class)
{
    $result = $pdo->prepare('SELECT * FROM `students` WHERE surname=:surname AND name=:name AND lastname=:lastname AND class=:class');
    $result->execute(array('surname' => $surname, 'name' => $name, 'lastname' => $lastname, 'class' => $class));
    return $result;
}