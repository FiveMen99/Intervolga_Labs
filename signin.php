<?php
include("bd.php");
include ("validation.php");
include_once ("safetyrequest.php");
require_once('table/userstable.php');
$validationlogin=validation($_POST['login'],'email');
$validationpassword=validation($_POST['password'],'password');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($validationlogin==0)
    {
        setcookie('error','Что-то с логином не так!');
        header("Location: authorization.php");
        return 0;
    }
    if($validationpassword==0)
    {
        setcookie('error','Что-то с  паролем не так!');
        header("Location: authorization.php");
        return 0;
    }

    if(isset($_POST['login']) && isset($_POST['password']))
    {
        $result = readbylogin($pdo, safetyrequest($pdo,$_POST['login']));
        $row1 = $result->fetch(PDO::FETCH_ASSOC);
        if (!empty($row1))
        {
            if (password_verify(safetyrequest($pdo,$_POST['password']), $row1['password']))
            {
                session_start();
                $_SESSION['id']=$row1['id'];
                if($row1['isadmin']==1)
                {
                    $_SESSION['isadmin']=1;
                }
                else
                {
                    $_SESSION['isadmin']=0;
                }
                header("Location: students.php");
            }
            else
                {
                    setcookie('error','Неправильный пароль!');
                    header("Location: authorization.php");
                }
        } else
        {
            setcookie('error','Такого логина не существует!');
            header("Location: authorization.php");
        }
    }
}
else
{
    header("Location: authorization.php");
    setcookie('error','Ничего ты не взломаешь читер(наверное)...');
}
?>
