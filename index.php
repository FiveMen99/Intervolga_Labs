<?php
setcookie("login");
setcookie("parol");
include("bd.php");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Учителя- это наше все</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <link href="/docs/4.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="Главная.html">Лицей 9</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Проект.html">Журнал Успеваемости <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Учителя1.html">Наши учителя</a>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
  </nav>

<main role="main">
 <style>
	body { background: url(https://avatars.mds.yandex.net/get-altay/374295/2a0000015b16005ac30831ecf6ee93a1e0fb/orig)no-repeat;
background-size: 100%;	}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
  </style>

  <section class="jumbotron text-center">
    <div class="container">
      <h1 ” class="jumbotron-heading  mt-4">МОУ Лицей №9</h1>
      <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
      </div>

    <div class="container">     
      <form action="/laba/login.php" method="post" class="form-signin">
        <div class="text-center mb-4">
          <img class="mb-4" src="/docs/4.3.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" alt="bootstrap">
          <h1 class="h3 mb-3 font-weight-normal">Чтобы пользоваться услугами нашего сайта необходима авторизация!</h1>
    </div>

    <div class="form-label-group">
      <input type="text" name="login" class="form-control" placeholder="Login">
      <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
      <input type="Password" name="parol" class="form-control" placeholder="Password" >
      <label for="inputPassword">Password</label>
    </div>

     <button class="btn btn-lg btn-primary btn-block" type="submit" name='signin'>Sign in
     </button>
     </form>     
     </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>



</body>
</html>



