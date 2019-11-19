<?php
function printtable($pdo)
{
    $i=0;
    $result=readsortclass($pdo);
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        $class[$i]=$row['class'];
        $surname[$i]=$row['surname'];
        $name[$i]=$row['name'];
        $lastname[$i]=$row['lastname'];
        $idstud[$i]=$row['idstud'];
        $file[$i]=$row['file'];
        $i++;
    }
    if($i!=0)
    {
        $length = count($class);
        echo '<table border="1">';
        $i = 0;
        while ($i < $length)
        {
            echo '<tr>
             <th>' . $class[$i] . '</th>';

            echo '<th><a href="assessments.php?idstud=' . $idstud[$i] . '">' . $surname[$i] . ' ' . $name[$i] . ' ' . $lastname[$i] . '</a></th>';
            echo '<th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#id'.$i.'">Фото</button></th>';
            echo '<div class="modal fade" id="id'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <img src="/laba/'.$file[$i].'" class="m-auto m-5" width="400" height="255">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                  </div>
              </div>
          </div>';

            $i++;
        }
    }
    echo '</table>';
}
