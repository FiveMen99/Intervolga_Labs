<?php
include ("bd.php");
  echo "<table><tr><th>Дата</th><th>Математика</th><th>Русский язык</th></tr>";    
 $result = $pdo->query('SELECT * FROM class');
while($row=$result->fetch(PDO::FETCH_ASSOC)){
  echo '<tr><th>'. $row['date'] . '</th><th>'. $row['matematics'] . '</th><th>'. $row['russich']. '</th></tr>';
}
  echo '<tr><th>  <form action="/laba/insertbd.php" method="post" class="form-signin">
   
    
    <input  type="text" name="date"  placeholder="text" >
    
  </th>   
            <th> 
   
    <input type="text" name="matematics" placeholder="text">
    
  </th>
            <th>  
   
    <input type="text" name="russich" placeholder="text">
    
  </th>
  </tr>
  <tr><th><button type="submit">Добавить данные </button></th></tr>
  </table>

 

  </form>   
  '
  ?>