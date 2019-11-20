<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
$idstud =$_POST['select'];
$surname =$_POST['surname'];
$name =@$_POST['name'];
$lastname =@$_POST['lastname'];
$class=@$_POST['class'];
define("UPLOAD_DIR", $_SERVER['DOCUMENT_ROOT']."/laba/uploads/");
define("DB_DIR","uploads/");
$result=readbyfull1($pdo,$surname,$name,$lastname,$class);
$row = $result->fetch(PDO::FETCH_ASSOC);

if(!empty($surname) &&!empty($name) &&!empty($lastname))//php валидация
{
    if(!empty($row))//Проверка на удаление записи
    {

        if (!empty($_FILES["myfile"]))//добавить новый файл
        {
            $myfile = $_FILES["myfile"];
            if ($myfile["error"] != UPLOAD_ERR_OK)
            {
                echo "Сир что-то не так";
                exit;
            }
            $namefile = preg_replace("/[^A-Z0-9._-]/i", "_", $myfile["name"]);
            $i = 0;
            $parts = pathinfo($namefile);
            while (file_exists(UPLOAD_DIR . $namefile))
            {
                $i++;
                $namefile = $parts["filename"] . "_" . $i . "." . $parts["extension"];
            }
            $success = move_uploaded_file($myfile["tmp_name"], UPLOAD_DIR . $namefile);
            if (!$success)
            {
                echo "Сир что-то не так1";
                exit;
            }
            $file = DB_DIR . $namefile;
            $result = readbyidstud1($pdo, $idstud);//Удаляем старый файл
            $row = $result->fetch(PDO::FETCH_ASSOC);
            define("DELETE", $_SERVER['DOCUMENT_ROOT'] . "/laba/");
            $link = $row['file'];
            $link1 = DELETE . $link;
            unlink("$link1");
        }
    }
    else
    {
        header("Location: /laba/students.php?error=1");
        return 0;
    }

}
else
{
    
    header("Location: /laba/students.php?error=2");
    return 0;
}
update($pdo,$idstud,$surname,$name,$lastname,$class,$file);//обновляем данные
header("Location: /laba/students.php");
?>