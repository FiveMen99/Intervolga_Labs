<?php
function user_readbylogin ($pdo, $login){
    $result = $pdo->prepare('SELECT * FROM `users` WHERE login=:login');
    $result->execute(array('login' => $login));
    return $result;
}
function user_create ($pdo, $login, $password, $isadmin)
{
    $result = $pdo->prepare('INSERT INTO `users` (`login`, `password`, `isadmin`) VALUES (:login, :password, :isadmin);');
    $result->execute(array('login' => $login, 'password' => $password, 'isadmin' => $isadmin));
}
function user_createonlylogin($pdo,$login)
{
    $result = $pdo->prepare('INSERT INTO `users` (`login`) VALUES (:login);');
    $result->execute(array('login' => $login));
}
?>