function students()
{
    var params;
    var href="crudstudents/read.php";
    ajaxpostbody(params,href);
}
function createstudents() {
    var form = document.forms.namedItem("fileinfoo");
    var oData = new FormData(form);
    var oReq = new XMLHttpRequest();
    oReq.open("POST", "crudstudents/create.php", true);
    oReq.send(oData);
    oReq.onreadystatechange = function() {
        if (oReq.readyState == XMLHttpRequest.DONE && oReq.status == 200) {
            students();
        }
    };
}
function updatestudents(i) {
    var skleyka="fileinfo" + i;
    var form = document.forms.namedItem(skleyka);
    var oData = new FormData(form);
    var oReq = new XMLHttpRequest();
    oReq.open("POST", "crudstudents/update.php", true);
    oReq.send(oData);
    oReq.onreadystatechange = function() {
        if (oReq.readyState == XMLHttpRequest.DONE && oReq.status == 200) {
            students();
        }
    };
}

function deletestudents(idstud)
{
    var params='idstud=' + idstud;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'crudstudents/delete.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            var params;
            var href="crudstudents/read.php";
            ajaxpostbody(params,href);
        }
    };
    xhr.send(params);
}