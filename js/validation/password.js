let password=document.getElementById('password');
let button=document.getElementById('button');
button.addEventListener('click', function(e)
    {
        let str1 = password.value;
        if(password.value=='')
        {
            alert("Необходимо ввести ваш пароль");
            e.preventDefault();
            return false;
        }
        if(password.value.length<5 || password.value.length>15 )
        {
            alert("У пароля должна быть длина от 5 до 15 символов");
            e.preventDefault();
            return false;
        }
    }
    ,false);