<?php
echo '
        <div class="container">
            <h1 ” class="jumbotron-heading  mt-4">МОУ Лицей №9</h1>
            <p class="lead text-muted">"Учиться надо всю жизнь, до последнего дыхания!"</p>
        </div>

        <div class="container" id="form">
                <div class="form-label-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                    <label for="inputEmail">Email address</label>
                </div>
                <div class="form-label-group">
                    <input type="Password" name="password" class="form-control" placeholder="Password" id="password" >
                    <label for="inputPassword">Password</label>
                </div>
                <input type="hidden" name="g-recaptcha-responce" id="g-recaptcha-responce" >
                <button class="btn btn-lg btn-primary btn-block" type="submit" name=signin" id="button" onclick="registrationcheck()">Registration
                </button>
        </div>
        <div class="alert alert-success margin p-2 block" id="success">
            <strong>Успешно Зарегистрировались!</strong><a onclick="authorization()" href="##">  Авторизируйтесь пожалуйста!</a>
        </div>
        <div class="alert alert-danger margin block p-2" id="errorblock">
            <strong id="error"></strong>
        </div>';
?>


