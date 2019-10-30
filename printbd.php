<?php
include ("bd.php");
  //делаем таблицу
  echo "<table><tr><th>Дата</th><th>Математика</th><th>Русский язык</th><th>История</th><th>Средний балл</th><th></th></tr>";    
  $result = $pdo->query('SELECT * FROM class');
  echo '<tr><th> 
   <form action="/laba/insertbd.php" method="post" class="form-signin">
   <input  type="text" name="date" id="date"  placeholder="чч.мм.год" >
    </th>
    <th> 
   <input type="text" name="matematics" id="matematics" placeholder="оценка">
    </th>
    <th>  
   <input type="text" name="russich" id="russich" placeholder="оценка">
    </th>
    <th>
   <input type="text" name="history" id="history" placeholder="оценка">
    </th>
    <th>
    Считается автоматически
    </th>
    <th>
   <button type="submit" id="button">Добавить данные </button>
   </th></tr>';
   //печать из бд полученные данные
   while($row=$result->fetch(PDO::FETCH_ASSOC))
   {
  $averageball=round(($row['matematics']+$row['russich']+$row['history'])/3,2);
   echo '<tr><th>'. $row['date'] . '</th><th>'. $row['matematics'] . '</th><th>'. $row['russich']. '</th><th>'. $row['history']. '</th><th>'. $averageball. '</th></tr>';
   }
  echo'
  </table>
  </form>   
  '
  ?>