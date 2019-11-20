<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
$surname =@$_POST['surnamec'];
$name =@$_POST['namec'];
$lastname =@$_POST['lastnamec'];
$class=@$_POST['classc'];
define("UPLOAD_DIR", $_SERVER['DOCUMENT_ROOT']."/laba/uploads/");
define("DB_DIR","uploads/");

if(!empty($name)&&!empty($surname)&&!empty($lastname))
{
    if (!empty($_FILES["myfile"]))
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
    }
}
$file=DB_DIR.$namefile;
create($pdo,$surname,$name,$lastname,$class,$file);
header("Location: /laba/students.php");
?>


