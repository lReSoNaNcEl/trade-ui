<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Предложения не проданных квартир не выше средней стоимости</h2>
    <form action="6.php" method="GET">
        <div>
            <input type="submit" name="req_6" value="Поиск">
        </div>
    </form>

<?php

if (isset($_GET['req_6'])) {

    $sql = "SELECT AVG(`price`) FROM `flat` WHERE `is_sold` = 'no'";
    $request = mysqli_query($db, $sql);

    while ($data = mysqli_fetch_array($request)) {
        $average_price = floor($data['AVG(`price`)']);
    }

    $sql = "SELECT * FROM `flat` WHERE `price` <= {$average_price}";
    $request = mysqli_query($db, $sql);

    if (!empty(mysqli_num_rows($request))) {
        echo '<div class="container">';
        echo "<h2>Средняя  стоимость всех квартир: {$average_price}руб.</h2>";
        while ($data = mysqli_fetch_array($request)) {
            getItemLine([
                'Улица: ' . $data['street'],
                'Номер дома: ' . $data['number'],
                'Площадь: ' . $data['square'] . 'кв.м.',
                'Комнаты: ' . $data['amount_rooms'],
                'Этаж: ' . $data['floor'],
                'Цена: ' . $data['price'] . 'руб.',
                'Статус продажи: ПРОДАЁТСЯ'
            ]);
        }

        echo '</div>';
    }
    else
        echo 'Ничего не найдено, попробуйте указать другую стоимость';


}