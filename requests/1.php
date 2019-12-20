<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

<link rel="stylesheet" href="../css/create.css">
<link rel="stylesheet" href="../css/record.css">

<h2>Предложения непроданных квартир по районам</h2>
<form action="1.php" method="GET">

    <div>
        <label for="req1_district">Район</label>
        <select name="req1_district">
            <option value="Левобережный">Левобережный</option>
            <option value="Правобережный">Правобережный</option>
            <option value="Советский">Советский</option>
            <option value="Октябрьский">Октябрьский</option>
        </select>
    </div>

    <input type="submit" name="req_1" value="Поиск">
</form>

<?php

if (isset($_GET['req_1'])) {

    if (!empty($_GET['req1_district'])) {
        $district = htmlspecialchars(trim($_GET['req1_district']));

        $sql = "SELECT * FROM `house` WHERE `district` = '{$district}'";
        $request = mysqli_query($db, $sql);



        if (!empty($request)) {
            while ($data = mysqli_fetch_array($request)) {
                $numbers[] += $data['number'];
            }

            echo '<div class="container">';

            foreach ($numbers as $number) {

                $sql = "SELECT * FROM `flat` WHERE `id_house` = {$number}";
                $request = mysqli_query($db, $sql);

                if (!empty(mysqli_num_rows($request))) {
                    while ($data = mysqli_fetch_array($request)) {
                        getItemLine([
                            'Номер дома: ' . $data['id_house'],
                            'Улица: ' . $data['street'],
                            'Номер квартиры: ' . $data['number'],
                            'Площадь: ' . $data['square'] . 'кв.м.',
                            'Комнаты: ' . $data['amount_rooms'],
                            'Этаж: ' . $data['floor'],
                            'Цена: ' . $data['price'] . 'руб.',
                            'Статус продажи: ПРОДАЁТСЯ'
                        ]);
                    }
                }
            }

            echo '</div>';
        }
    } else
        echo 'Заполните пустые поля';
}

?>
