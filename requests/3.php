<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

<h2>Предложения непроданных квартир по типу дома и улицы</h2>
<form action="3.php" method="GET">

    <label for="req3_brick_panel">Тип кладки</label>
    <select name="req3_brick_panel">
        <option value="B">Кирпич</option>
        <option value="P">Панель</option>
    </select>

    <div>
        <label for="req3_street">Улица</label>
        <input type="search" value="<?php if (isset($district)) echo $district;?>" name="req3_street">
    </div>

    <input type="submit" name="req_3" value="Поиск">
</form>

<?php

if (isset($_GET['req_3'])) {

    if (!empty($_GET['req3_brick_panel']) && !empty($_GET['req3_street'])) {

        $street = htmlspecialchars(trim($_GET['req3_street']));
        $brick_panel = htmlspecialchars(trim($_GET['req3_brick_panel']));

        $sql = "SELECT * FROM `house` WHERE `street` LIKE '%{$street}%' AND `brick_panel` = '{$brick_panel}'";
        $request = mysqli_query($db, $sql);

        if (!empty(mysqli_num_rows($request))) {

            while ($data = mysqli_fetch_array($request)) {
                $numbers[] += $data['number'];
            }

            echo '<div class="container">';
            foreach ($numbers as $number) {
                $sql = "SELECT * FROM `flat` WHERE `id_house` = '{$number}' AND `is_sold` = 'no'";
                $request = mysqli_query($db, $sql);

                if (!empty(mysqli_num_rows($request)))
                    while ($data = mysqli_fetch_array($request)) {
                        getItemLine([
                            'Номер дома: ' . $data['number'],
                            'Площадь: ' . $data['square'] . 'кв.м.',
                            'Комнаты: ' . $data['amount_rooms'],
                            'Этаж: ' . $data['floor'],
                            'Цена: ' . $data['price'] . 'руб.',
                            'Район: ' . $data['district'],
                            'Статус продажи: ПРОДАЁТСЯ'
                        ]);
                    }

            }
            echo '</div>';
        }
        else
            echo 'Ничего не найдено, попробуйте указать другую улицу';

    }
    else
        echo 'Заполните пустые поля';
}



?>