<?php

function createHouse() {
    if (isset($_POST['house_btn'])) {

        global $db;

        $district = htmlspecialchars(trim($_POST['house_district']));
        $street = htmlspecialchars(trim($_POST['house_street']));
        $number = htmlspecialchars(trim($_POST['house_number']));
        $amount_floors = htmlspecialchars(trim($_POST['house_amount_floors']));
        $brick_panel = htmlspecialchars(trim($_POST['house_brick_panel']));
        $is_elevator = htmlspecialchars(trim($_POST['house_is_elevator']));

        if (empty($_POST['house_district']) ||
            empty($_POST['house_street']) ||
            empty($_POST['house_number']) ||
            empty($_POST['house_amount_floors']) ||
            empty($_POST['house_brick_panel']) ||
            empty($_POST['house_is_elevator'])) {

            echo 'Заполните пустые поля';
        }
        else {
            $sql = "INSERT INTO `house` (`district`, `street`, `number`, `amount_floors`, `brick_panel`, `is_elevator`) VALUES ('{$district}', '{$street}', '{$number}', '{$amount_floors}', '{$brick_panel}', '{$is_elevator}')";
            $request = mysqli_query($db, $sql);

            echo 'Запись успешно добавлена';
        }
    }
}

function createFlat() {
    if (isset($_POST['flat_btn'])) {

        global $db;

        $street = htmlspecialchars(trim($_POST['flat_street']));
        $id_house = htmlspecialchars(trim($_POST['flat_id_house']));
        $number = htmlspecialchars(trim($_POST['flat_number']));
        $square = htmlspecialchars(trim($_POST['flat_square']));
        $amount_rooms = htmlspecialchars(trim($_POST['flat_amount_rooms']));
        $floor = htmlspecialchars(trim($_POST['flat_floor']));
        $price = htmlspecialchars(trim($_POST['flat_price']));
        $is_sold = htmlspecialchars(trim($_POST['flat_is_sold']));

        if (!empty($_POST['flat_street']) &&
            !empty($_POST['flat_id_house']) &&
            !empty($_POST['flat_number']) &&
            !empty($_POST['flat_square']) &&
            !empty($_POST['flat_amount_rooms']) &&
            !empty($_POST['flat_floor']) &&
            !empty($_POST['flat_price']) &&
            !empty($_POST['flat_is_sold'])) {

            $sql = "INSERT INTO `flat` (`street`, `id_house` ,`number`, `square`, `amount_rooms`, `floor`, `price`, `is_sold`) VALUES ('{$street}', '{$id_house}', '{$number}', '{$square}', '{$amount_rooms}', '{$floor}', '{$price}', '{$is_sold}')";

            $request = mysqli_query($db, $sql);

            echo 'Запись успешно добавлена';
        }
        else
            echo 'Заполните пустые поля';
    }
}

function createRequest() {
    if (isset($_POST['request_btn'])) {

        global $db;

        $fio = htmlspecialchars(trim($_POST['request_fio']));
        $passport = htmlspecialchars(trim($_POST['request_passport']));
        $phone = htmlspecialchars(trim($_POST['request_phone']));
        $amount_rooms = htmlspecialchars(trim($_POST['request_amount_rooms']));
        $date = date('Y-m-d H:i:s');
        $district = htmlspecialchars(trim($_POST['request_district']));

        if (!empty($_POST['request_fio']) &&
            !empty($_POST['request_passport']) &&
            !empty($_POST['request_phone']) &&
            !empty($_POST['request_amount_rooms']) &&
            !empty($_POST['request_district'])) {

            $sql = "INSERT INTO `request` (`fio`, `passport`, `phone`, `amount_rooms`, `date`, `district`) VALUES ('{$fio}', '{$passport}', '{$phone}', '{$amount_rooms}', '{$date}', '{$district}')";

            $request = mysqli_query($db, $sql);

            echo 'Запись успешно добавлена';
        } else
            echo 'Заполните пустые поля';

    }
}

function getItemLine($data) {
    echo '<div class="record">';
    foreach ($data as $item) {
        echo "<div class=\"item\">{$item}</div>";
    }
    echo '</div>';
}

?>