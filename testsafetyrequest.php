<?php
include_once "safetyrequest.php";
include_once "bd.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    @$request=@$_POST['request'];
    @$request=safetyrequest($pdo,@$request);
}
if(session_id() == '') {
    session_start();
}
if(!empty($_SESSION['id']))
{
    table(@$request);
}
else
{
    include $_SERVER['DOCUMENT_ROOT']."/laba/authorization.php";
}
function table($request){
    echo '
        <div class="container" >
            <h1 ” class="jumbotron-heading  mt-4" > МОУ Лицей №9 </h1 >
            <p class="lead text-muted" > "Учиться надо всю жизнь, до последнего дыхания!"</p >
        </div >
            <div class="text-center mb-4" >
                <h1 class="h3 mb-3 font-weight-normal" > Проверьте мою защиту от негодяев </h1 >
            </div >
            <div class="form-label-group" ><input type = "text" name = "request" class="form-control margin" placeholder = "Что-то любое" id = "request" ></div >
            <button class="btn btn-lg btn-primary btn-block margin"  onclick="request()" type = "submit" name = "signin" id = "button" > Проверить</button >
            ';
            echo @$request;
}