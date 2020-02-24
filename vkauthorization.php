<?php
require_once ("bd.php");
require_once ("table/userstable.php");
if  (!empty($_GET ['code']))
{
    $user=new user();
    session_start();
    $id_app     =     '7234843' ;                      //Айди приложения
    $secret_app =    'IIrPZ8WkVCDJMMYZagtB';         // Защищённый ключ. Можно узнать там же где и айди
    $url_script   =    'http://localhost/laba/vkauthorization.php'; //ссылка на этот скрипт
    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.$id_app.'&client_secret='.$secret_app.'&code='.$_GET['code'].'&redirect_uri='.$url_script), true);
    $id= "vk" . $token['user_id'];
    $result=$user->readbylogin($pdo,$id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if(empty($row))
    {
        $user->createonlylogin($pdo,$id);
        $_SESSION['id'] = $id;
        $_SESSION['isadmin'] = 0;
    }
    else
    {
        $_SESSION['id'] = $row['login'];
        if ($row['isadmin'] == 1)
        {
            $_SESSION['isadmin'] = 1;
        }
        else
        {
            $_SESSION['isadmin'] = 0;
        }
    }
    header("Location: index.php");
}
else
{
    header("Location: index.php");
}
