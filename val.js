
   var date=document.getElementById('date');
   var matematics=document.getElementById('matematics');
   var russich=document.getElementById('russich');
   var button=document.getElementById('button');
let regexp = /([01-9])+\.([01-9])+\.([01-9]){4}/;
let regexp1 = /([01-9]){1}/;
 




   button.addEventListener('click', function(e)
   {
    let str = date.value;
    let str1 = matematics.value;
    let str2 =russich.value;
    var flag=0;
    var flag1=0;
    var flag2=0;

    if(date.value.length!=10|!regexp.test(str)){
      flag=1;
    }

    if(matematics.value.length!=1||!regexp1.test(str1)){
      flag1=1;
    }

    if(russich.value.length!=1||!regexp1.test(str2)){
      flag2=1;
    }

   if(date.value.length==10 && matematics.value.length==1 &&russich.value.length==1 && regexp.test(str) && regexp1.test(str1) && regexp1.test(str2))
    {
    }
   else
    {
      if(flag==1)
      {
      date.style.border="2px solid red";
      }

     if(flag1==1)
     {
    matematics.style.border="2px solid red";
     }
    if(flag2==1){
    russich.style.border="2px solid red";
    }
    e.preventDefault();
     
  }
  }
   ,false);
