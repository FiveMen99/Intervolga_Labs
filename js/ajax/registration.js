function registration() {
    var params;
    var href="registration.php";
    ajaxpostbody(params,href);
}
function registrationcheck() {
    var email=document.querySelector('input[name=email]');
    var password=document.querySelector('input[name=password]');
    var params='email=' + email.value + '&' + 'password=' + password.value;
    ajaxregistration(params);
}