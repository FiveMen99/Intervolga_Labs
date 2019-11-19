let login=document.getElementById('login');
let regexp = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
button.addEventListener('click', function(e)
    {
        let str = login.value;


        if(login.value=='')
        {
            alert("Необходимо ввести ваш логин");
            e.preventDefault();
            return false;
        }
        if(login.value.length<5 || login.value.length>15 )
        {
            alert("У логина должна быть длина от 5 до 15 символов");
            e.preventDefault();
            return false;
        }
        if(!regexp.test(str))
        {
            alert("Почта должна выглядить примерно вот так examples@mail.ru");
            e.preventDefault();
            return false;
        }


    }
    ,false);
