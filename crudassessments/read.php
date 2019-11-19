<?php
function sort_date($a_new, $b_new) {
    $a_new = strtotime($a_new);
    $b_new = strtotime($b_new);
    return $a_new - $b_new;
}
function printtableassigment($pdo,$idstud,$result)
{
    setcookie("idstud", $idstud);
    $idsub = 1;
    $i = 0;
    $j = 0;
    $k = 0;
    $amount = 3;
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $mass[$i] = $row['date'];
        $i = $i + 1;
    }
    if (!empty($mass))
    {
        $mass = array_unique($mass);
        //usort($mass, "sort_date");
        $i = count($mass);
    }
    echo '
        <table>
            <tr>
                <th>Дата</th>';
    while ($j < $i)
    {
        echo '<th>' . $mass[$j] . '</th>';
        $j = $j + 1;
    }
    echo '
                <th>Средняя оценка</th>
            </tr>';
    while ($idsub <= $amount)
    {
        $summ = 0;
        $quantity = 0;
        $result1=readbyidsub($pdo,$idsub);
        $row1 = $result1->fetch(PDO::FETCH_ASSOC);
        echo '<tr><th>' . $row1['name'] . '</th>';
        $k = 0;
        while ($k < $i)
        {
            $result2=readbyfull($pdo,$idstud,$idsub,$mass,$k);
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            if (is_numeric($row2['assessments']))
            {
                $summ = $summ + $row2['assessments'];
                $quantity++;
            }
            echo '<th>' . $row2['assessments'] . '</th>';
            $k++;
        }
        if ($summ != 0)
        {
            $average = round($summ / $quantity, 2);
        }
        else $average = '-';
        if ($average >= 4.5)
        {
            echo '<th class="green">' . $average . '</th></tr>';
        }
        if ($average >= 3.5 and $average < 4.5)
        {
            echo '<th class="lightgreen">' . $average . '</th></tr>';
        }
        if ($average >= 2.5 and $average < 3.5)
        {
            echo '<th class="yellow">' . $average . '</th></tr>';
        }
        if ($average < 2.5 and $average >= 2)
        {
            echo '<th class="red">' . $average . '</th></tr>';
        }
        if ($average == '-')
        {
            echo '<th>' . $average . '</th></tr>';
        }
        $idsub++;
    }
    echo '</table>';
}
