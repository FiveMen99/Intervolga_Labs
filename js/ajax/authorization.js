function authorization()
{
    var params;
    var href="authorization.php";
    ajaxpostbody(params,href);
}
function authorizationcheck() {
    var email=document.querySelector('input[name=email]');
    var password=document.querySelector('input[name=password]');
    var params='email=' + email.value + '&' + 'password=' + password.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'signin.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            var check=xhr.responseText;
            var success="1";
            if(check==success)
            {
                var params;
                var href="crudstudents/read.php";
                ajaxpostheader(params);
                ajaxpostbody(params,href);
                document.getElementById('body').innerHTML=xhr.responseText;
            }
            else
            {
                document.getElementById('errorblock').style.display = 'block';
                document.getElementById('error').innerHTML=xhr.responseText;
            }
        }
    };
    xhr.send(params);
}
function authorizationout() {
    var params=0;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'signout.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            var href="authorization.php";
            ajaxpostbody(params,href);
            ajaxpostheader(params);
        }
    };
    xhr.send(params);
}