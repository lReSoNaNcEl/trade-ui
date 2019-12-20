<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Рассчет стоимости квартиры с учетом оплаты работы фирмы (+10% к исходной цене)</h2>
    <form action="10.php" method="GET">

        <div>
            <label for="req10_street">Улица</label>
            <input type="text" name="req10_street">
        </div>

        <div>
            <label for="req10_id_house">Номер дома</label>
            <input type="text" name="req10_id_house">
        </div>

        <div>
            <label for="req10_number">Номер квартиры</label>
            <input type="text" name="req10_number">
        </div>

        <input type="submit" name="req_10" value="Рассчитать">
    </form>

<?php

if (isset($_GET['req_10'])) {

    if (!empty($_GET['req10_id_house']) && !empty($_GET['req10_number'])) {

        $validate = false;
        $pattern = '/^[0-9]+$/';

        $street = htmlspecialchars(trim($_GET['req10_street']));
        $id_house = htmlspecialchars(trim($_GET['req10_id_house']));
        $number = htmlspecialchars(trim($_GET['req10_number']));

        if (preg_match($pattern, $id_house) && preg_match($pattern, $number))
            $validate = true;


        if ($validate) {
            $sql = "SELECT * FROM `house` WHERE `number` = {$id_house} AND `street` = '{$street}'";
            $request = mysqli_query($db, $sql);

            if (!empty(mysqli_num_rows($request))) {
                $sql = "SELECT * FROM `flat` WHERE `id_house` = {$id_house} AND `number` = {$number}";
                $request = mysqli_query($db, $sql);

                if (!empty(mysqli_num_rows($request))) {
                    echo '<div class="container">';
                    while ($data = mysqli_fetch_array($request)) {
                        $price = $data['price'] + $data['price'] * 0.1;

                        getItemLine([
                            "Исходная цена квартиры: {$data['price']} руб.",
                            "Итоговая стоимость: {$price} руб.",
                        ]);
                    }
                    echo '</div>';
                }
                else
                    echo 'Ничего не найдено, попробуйте указать другой номер квартиры';
            }
            else
                echo 'Ничего не найдено, попробуйте указать другой адрес';
        }
        else
            echo 'Введено некорректное значение в поле';

    }
    else
       echo 'Заполните пустые поля';

//
//        if (!empty(mysqli_num_rows($request))) {
//            echo '<div class="container">';
//
//            while ($data = mysqli_fetch_array($request)) {
//                getItemLine([
//                    'Номер дома: ' . $data['number'],
//                    'Площадь: ' . $data['square'] . 'кв.м.',
//                    'Комнаты: ' . $data['amount_rooms'],
//                    'Этаж: ' . $data['floor'],
//                    'Цена: ' . $data['price'] . 'руб.',
//                    'Район: ' . $data['district'],
//                    'Статус продажи: ПРОДАЁТСЯ'
//                ]);
//            }
//
//            echo '</div>';
//        }
//        else
//            echo 'Ничего не найдено, попробуйте указать другую стоимость';
//
//    }
}