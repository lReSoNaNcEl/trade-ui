<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');
?>

<link rel="stylesheet" href="../css/create.css">
<link rel="stylesheet" href="../css/record.css">

<h2>Предложения по заявке клиента и району</h2>
<form action="2.php" method="GET">

    <div>
        <label for="req2_fio">ФИО клиента</label>
        <input type="text" name="req2_fio">
    </div>

    <input type="submit" name="req_2" value="Поиск">
</form>

<?php

if (isset($_GET['req_2'])) {

    if (!empty($_GET['req2_fio'])) {
        $fio = htmlspecialchars(trim($_GET['req2_fio']));

        $sql = "SELECT * FROM `request` WHERE `fio` LIKE '%{$fio}%'";
        $request = mysqli_query($db, $sql);

        if (!empty(mysqli_num_rows($request))) {

            while ($data = mysqli_fetch_array($request)) {
                $fio_client = $data['fio'];
                $amount_rooms = $data['amount_rooms'];
                $district = $data['district'];
            }

            $sql = "SELECT * FROM `house` WHERE `district` = '{$district}'";
            $request = mysqli_query($db, $sql);

            while ($data = mysqli_fetch_array($request)) {
                $numbers[] += $data['number'];
            }

            echo '<div class="container">';
            echo "<h2>Клиент: {$fio_client}</h2>";
            foreach ($numbers as $number) {
                $sql = "SELECT * FROM `flat` WHERE `id_house` = {$number} AND `amount_rooms` = '{$amount_rooms}'";
                $request = mysqli_query($db, $sql);

                while ($data = mysqli_fetch_array($request)) {
                    getItemLine([
                        "Улица:  {$data['street']}",
                        'Номер квартиры: ' . $data['number'],
                        'Площадь: ' . $data['square'] . 'кв.м.',
                        'Количество комнат: ' . $data['amount_rooms'],
                        'Этаж: ' . $data['floor'],
                        'Цена: ' . $data['price'] . 'руб.',
                    ]);
                }
            }
            echo '</div>';
        }
        else
            echo 'Клиент не найден, попробуйте изменить данные';

    }
    else
        echo 'Заполните пустые поля';
}

?>