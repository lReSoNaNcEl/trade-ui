<?php
require('../connect.php');
require('../functions.php');
require('navmenu.php');
createHouse();
?>

<!--<link rel="stylesheet" href="../css/default.css">-->
<link rel="stylesheet" href="../css/create.css">

<form action="create_house.php" method="POST" class="house">

    <h2 class="title">Дом</h2>
    <div>
        <label for="house_district">Район</label>
        <select name="house_district">
            <option value="Левобережный">Левобережный</option>
            <option value="Правобережный">Правобережный</option>
            <option value="Советский">Советский</option>
            <option value="Октябрьский">Октябрьский</option>
        </select>
    </div>

    <div>
        <label for="house_street">Улица</label>
        <input type="text" name="house_street">
    </div>

    <div>
        <label for="house_number">Номер дома</label>
        <input type="text" name="house_number">
    </div>

    <div>
        <label for="house_amount_floors">Количество этажей</label>
        <input type="text" name="house_amount_floors">
    </div>

    <div>
        <label for="house_brick_panel">Тип кладки</label>
        <select name="house_brick_panel">
            <option value="B">Кирпич</option>
            <option value="P">Панель</option>
        </select>
    </div>

    <div>
        <label for="house_is_elevator">Лифт</label>
        <select name="house_is_elevator">
            <option value="yes">Есть лифт</option>
            <option value="no">Нет лифта</option>
        </select>
    </div>

    <input type="submit" value="Добавить" name="house_btn">
</form>