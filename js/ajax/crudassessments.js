function readassessments(idstud)
{
    var params='idstud=' + idstud;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'crudassessments/read.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.getElementById('body').innerHTML=xhr.responseText;
        }
    };
    xhr.send(params);
}
function createassessments(idstud)
{
    var date=document.querySelector('input[name=date]');
    var select=document.getElementById("subject");
    var subject=select.options[select.selectedIndex].value;
    var select1=document.getElementById("assessmets");
    var assessments=select1.options[select1.selectedIndex].value;
    var params='select=' + subject + '&' + 'date=' + date.value + '&' + 'assessments=' + assessments + '&' + 'idstud=' + idstud;
    var href="crudassessments/create.php";
    ajaxpostbody(params,href);

}
function deleteassessments(id,idstud)
{
    var params='id=' + id + '&' +'idstud=' +idstud;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'crudassessments/delete.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            readassessments(idstud);
        }
    };
    xhr.send(params);
}
function updateassessments(id,idstud)
{
    var conc="assessments" + id;
    var select1=document.getElementById(conc);
    var assessments=select1.options[select1.selectedIndex].value;
    var params='id=' + id + '&' +'assessments=' + assessments;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'crudassessments/update.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            var errors=xhr.responseText;
            readassessments(idstud);
            document.getElementById('error').innerHTML=errors;

        }
    };
    xhr.send(params);
}