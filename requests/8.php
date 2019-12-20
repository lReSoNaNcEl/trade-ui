<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Рассчет максимальной/минимальной/средней цены квартир панельного типа по району и выше указанной площади</h2>
    <form action="8.php" method="GET">

        <div>
            <label for="req8_district">Район</label>
            <select name="req8_district">
                <option value="Левобережный">Левобережный</option>
                <option value="Правобережный">Правобережный</option>
                <option value="Советский">Советский</option>
                <option value="Октябрьский">Октябрьский</option>
            </select>
        </div>

        <div>
            <label for="req8_square">Площадь (кв.м.)</label>
            <input type="text" name="req8_square">
        </div>

        <input type="submit" name="req_8" value="Поиск">
    </form>

<?php

if (isset($_GET['req_8'])) {

    if (!empty($_GET['req8_district']) && !empty($_GET['req8_square'])) {

        $validate = false;

        $district = htmlspecialchars(trim($_GET['req8_district']));
        $square = htmlspecialchars(trim($_GET['req8_square']));

        if (preg_match('/^[0-9]+$/', $square))
            $validate = true;
        else
            echo 'Введено некорректное значение в поле';

        if ($validate) {
            $sql = "SELECT * FROM `house` WHERE `brick_panel` = 'P' AND `district` = '{$district}'";
            $request = mysqli_query($db, $sql);

            while ($data = mysqli_fetch_array($request)) {
                $numbers[] += $data['number'];
            }

            foreach ($numbers as $number) {
                $sql = "SELECT MIN(`price`), MAX(`price`), AVG(`price`) FROM  `flat` WHERE `id_house` = '{$number}' AND `is_sold` = 'no' AND `square` >= {$square}";
                $request = mysqli_query($db, $sql);

                if (!empty(mysqli_num_rows($request))) {
                    while ($data = mysqli_fetch_array($request)) {
                        if (!empty($data['MIN(`price`)']))
                            $min_price = floor($data['MIN(`price`)']);

                        if (!empty($data['MAX(`price`)']))
                            $max_price = floor($data['MAX(`price`)']);

                        if (!empty($data['AVG(`price`)']))
                            $avg_price = floor($data['AVG(`price`)']);
                    }
                }
            }

            if ($min_price === null || $max_price === null || $avg_price === null) {
                echo 'Ничего не найдено';
            }
            else {
                echo '<div class="container">';
                getItemLine([
                    "Минимальная стоимость: {$min_price}руб.",
                    "Максимальная стоимость: {$max_price}руб.",
                    "Средняя стоимость: {$avg_price}руб."
                ]);
                echo '</div>';
            }

        }
    } else
        echo 'Заполните пустые поля';
}