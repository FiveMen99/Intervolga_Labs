<?php
include("bd.php");
include_once("table/userstable.php");
include("validation.php");
$validationlogin=validation($_POST['login'],'email');
$validationpassword=validation($_POST['password'],'password');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($validationlogin==0)
    {
        setcookie('error1','Что-то с логином не так!');
        header("Location: registration.php");
        return 0;
    }
    if($validationpassword==0)
    {
        setcookie('error1','Что-то с  паролем не так!');
        header("Location: registration.php");
        return 0;
    }
    if (isset($_POST['login']) && isset($_POST['password']))
    {
        $login = $_POST['login'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $isadmin = 0;
        $result=readbylogin($pdo,$login);
        $row1 = $result->fetch(PDO::FETCH_ASSOC);
        if (empty($row1))
        {
            create($pdo,$login,$password,$isadmin);
            setcookie('success', '1');
        } else
        {
            setcookie('error1', 'Такой логин уже существует');
        }
    }
}
else
{
    header("Location: authorization.php");
}
header("Location: registration.php");
?>

