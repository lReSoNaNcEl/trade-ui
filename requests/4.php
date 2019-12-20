<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

$max_price = htmlspecialchars(trim($_GET['req4_max_price']));

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Предложения квартир не выше введенной стоимости</h2>
    <form action="4.php" method="GET">

        <div>
            <label for="req4_max_price">Максимальная цена</label>
            <input type="search" name="req4_max_price" value="<?php if (isset($max_price)) echo $max_price?>">
        </div>

        <input type="submit" name="req_4" value="Поиск">
    </form>

<?php

if (isset($_GET['req_4'])) {

    if (!empty($_GET['req4_max_price'])) {

        $validate = false;
        $pattern = '/^[0-9]+$/';

        if (preg_match($pattern, $max_price))
            $validate = true;

        if ($validate) {
            $sql = "SELECT * FROM `flat` WHERE `price` <= {$max_price}";
            $request = mysqli_query($db, $sql);

            if (!empty(mysqli_num_rows($request))) {
                echo '<div class="container">';

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

                echo '</div>';
            }
            else
                echo 'Ничего не найдено, попробуйте указать другую стоимость';
        }
        else
            echo 'Введено некорректное значение в поле';


    }
    else
        echo 'Заполните пустые поля';
}