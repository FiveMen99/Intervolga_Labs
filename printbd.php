<?php
include ("bd.php");
  echo "<table><tr><th>Дата</th><th>Математика</th><th>Русский язык</th><th></th></tr>";    
 $result = $pdo->query('SELECT * FROM class');

echo '<tr><th>  <form action="/laba/insertbd.php" method="post" class="form-signin">
   
    
    <input  type="text" name="date" id="date"  placeholder="text" >
    
  </th>   
            <th> 
   
    <input type="text" name="matematics" id="matematics" placeholder="text">
    
  </th>
            <th>  
   
    <input type="text" name="russich" id="russich" placeholder="text">
    
  </th>
  
  <th><button type="submit" id="button">Добавить данные </button></th></tr>';


while($row=$result->fetch(PDO::FETCH_ASSOC)){
  echo '<tr><th>'. $row['date'] . '</th><th>'. $row['matematics'] . '</th><th>'. $row['russich']. '</th></tr>';
}
  echo'
  </table>
  </form>   
  '
  ?>