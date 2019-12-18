<?php
echo '<div class="container">
              <h1 class="jumbotron-heading"">МОУ Лицей №9</h1>
              <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
            <div>
    <div class="container" id="body">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Чтобы пользоваться услугами нашего сайта необходима авторизация!</h1>
        </div>
            <div class="form-label-group">
              <input type="email" name="email" autocomplete="on" autofocus class="form-control" placeholder="email" id="login" required>
              <label for="inputEmail">Email address</label>
            </div>
            <div class="form-label-group">
              <input type="Password" name="password" class="form-control" placeholder="Password" id="password" >
              <label for="inputPassword">Password</label>
            </div>
             <input type="hidden" name="g-recaptcha-responce" id="g-recaptcha-responce" >
             <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="authorizationcheck()" id="elem">Sign in
             </button>
        <div class="alert alert-danger margin block p-2" id="errorblock">
            <strong id="error"></strong>
        </div>
      <a>Нет в системе?</a><a href="" onclick="registration();event.preventDefault();">Зарегестрируйся!</a>
        <br>
        <a href="https://oauth.vk.com/authorize?client_id=7234843&display=page&redirect_uri=http://localhost/laba/vkauthorization.php&scope=friends&response_type=code&v=5.2"><img src="uploads/vklogo3.png" width="50"</a>
     </div>';
?>

