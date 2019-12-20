<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Предложения 2-х комнатных квартир в кирпичном доме с 3 по 7 этажи</h2>
    <form action="7.php" method="GET">
        <input type="submit" name="req_7" value="Поиск">
    </form>

<?php

if (isset($_GET['req_7'])) {

    $sql = "SELECT * FROM `house` WHERE `brick_panel` = 'B'";
    $request = mysqli_query($db, $sql);

    while ($data = mysqli_fetch_array($request)) {
        $numbers[] += $data['number'];
    }

    echo '<div class="container">';
    foreach ($numbers as $number) {
        $sql = "SELECT * FROM `flat` WHERE `id_house` = '{$number}' AND `is_sold` = 'no' AND `amount_rooms` = 2 AND `floor` BETWEEN 3 AND 7";
        $request = mysqli_query($db, $sql);

        if (!empty(mysqli_num_rows($request))) {
            while ($data = mysqli_fetch_array($request)) {
                getItemLine([
                    'Улица: ' . $data['street'],
                    'Номер дома: ' . $data['number'],
                    'Площадь: ' . $data['square'] . 'кв.м.',
                    'Комнаты: ' . $data['amount_rooms'],
                    'Этаж: ' . $data['floor'],
                    'Цена: ' . $data['price'] . 'руб.',
                ]);
            }
        }
    }
    echo '</div>';
}