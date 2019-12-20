<?php
require('../connect.php');
require('../functions.php');
require('navmenu.php');
createRequest();
?>

<link rel="stylesheet" href="../css/default.css">
<link rel="stylesheet" href="../css/create.css">

<form action="create_request.php" method="POST" class="request">

    <h2 class="title">Заявка клиента</h2>

    <div>
        <label for="request_fio">ФИО клиента</label>
        <input type="text" name="request_fio">
    </div>

    <div>
        <label for="request_passport">Паспортные данные</label>
        <input type="text" name="request_passport">
    </div>

    <div>
        <label for="request_phone">Телефон</label>
        <input type="text" name="request_phone">
    </div>

    <div>
        <label for="request_amount_rooms">Количество комнат</label>
        <select name="request_amount_rooms">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

    <div>
        <label for="request_district">Район</label>
        <select name="request_district">
            <option value="Левобережный">Левобережный</option>
            <option value="Правобережный">Правобережный</option>
            <option value="Советский">Советский</option>
            <option value="Октябрьский">Октябрьский</option>
        </select>
    </div>
    <input type="submit" value="Добавить" name="request_btn">
</form>