function index()
{
    var params;
    var href="main.php";
    ajaxpostbody(params,href);
}
function testsafetyrequest(){
    var params;
    var href="testsafetyrequest.php";
    ajaxpostbody(params,href);
}

function postsearch()
{
    var search=document.querySelector('input[name=search]');
    var params='search=' + search.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'search.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.getElementById('body').innerHTML = xhr.responseText;

        }
    };
    xhr.send(params);
}
function request()
{
    var request=document.querySelector('input[name=request]');
    var params='request=' + request.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'testsafetyrequest.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.getElementById('body').innerHTML = xhr.responseText;

        }
    };
    xhr.send(params);
}
