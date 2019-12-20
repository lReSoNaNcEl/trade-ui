<?php
require('../connect.php');
require('../functions.php');
require('navmenu.php');
createFlat();
?>

<link rel="stylesheet" href="../css/default.css">
<link rel="stylesheet" href="../css/create.css">

<form action="create_flat.php" method="POST" class="flat">

    <h2 class="title">Квартира</h2>

    <div>
        <label for="flat_street">Улица</label>
        <input type="text" name="flat_street">
    </div>

    <div>
        <label for="flat_id_house">Номер дома</label>
        <input type="text" name="flat_id_house">
    </div>

    <div>
        <label for="flat_number">Номер квартиры</label>
        <input type="text" name="flat_number">
    </div>

    <div>
        <label for="flat_square">Площадь (кв.м.)</label>
        <input type="text" name="flat_square">
    </div>
    <div>
        <label for="flat_amount_rooms">Количество комнат</label>
        <select name="flat_amount_rooms">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

    <div>
        <label for="flat_floor">Этаж</label>
        <input type="text" name="flat_floor">
    </div>

    <div>
        <label for="flat_price">Стоимость (руб.)</label>
        <input type="text" name="flat_price">
    </div>

    <div>
        <label for="flat_is_sold">Продано</label>
        <select name="flat_is_sold">
            <option value="yes">Квартира продана</option>
            <option value="no">Квартира не продана</option>
        </select>
    </div>

    <input type="submit" name="flat_btn" value="Добавить">
</form>