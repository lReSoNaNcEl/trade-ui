<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Рассчет средней цены квартир по количеству комнат</h2>
    <form action="5.php" method="GET">

        <div>
            <label for="req5_amount_rooms">Количество комнат</label>
            <select name="req5_amount_rooms">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>

        <input type="submit" name="req_5" value="Рассчитать">
    </form>

<?php

if (isset($_GET['req_5'])) {

    if (!empty($_GET['req5_amount_rooms'])) {

        $amount_rooms = htmlspecialchars(trim($_GET['req5_amount_rooms']));

        $sql = "SELECT AVG(`price`) FROM `flat` WHERE `amount_rooms` = '{$amount_rooms}'";
        $request = mysqli_query($db, $sql);


        if (!empty(mysqli_num_rows($request))) {

            echo '<div class="container">';
            while ($data = mysqli_fetch_array($request)) {
                getItemLine([
                       "Средняя цена {$amount_rooms}-x комнатных квартир: " . floor($data['AVG(`price`)']) . 'руб.'
                ]);
            }
            echo '</div>';
        }
        else
            echo 'Цена не подсчитана';

    }
    else
        echo 'Заполните пустые поля';
}