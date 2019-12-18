
function ajaxpostbody(params,href)
{
    var xhr = new XMLHttpRequest();
    xhr.open("POST", href, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.getElementById('body').innerHTML = xhr.responseText;
        }
    };
    xhr.send(params);
}
function ajaxpostheader(params)
{
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'header.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.getElementById('header').innerHTML = xhr.responseText;
        }
    };
    xhr.send(params);
}