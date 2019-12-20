<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Просмотр списка заявок за три месяца (по периоду) за определенный год</h2>
    <form action="11.php" method="GET">

        <div>
            <label for="req11_season">Период</label>
            <select name="req11_season">
                <option value="1">1 четверть (Январь/Фервраль/Март)</option>
                <option value="2">2 четверть (Апрель/Май/Июнь)</option>
                <option value="3">3 четверть (Июль/Август/Сентябрь)</option>
                <option value="4">4 четверть (Октябрь/Ноябрь/Декабрь)</option>
            </select>
        </div>

        <div>
            <label for="req11_year">Год</label>
            <input type="text" name="req11_year" maxlength="4">
        </div>

        <input type="submit" name="req_11" value="Поиск">
    </form>

<?php

if (isset($_GET['req_11'])) {

    if (!empty($_GET['req11_season']) && !empty($_GET['req11_year'])) {

        $season = htmlspecialchars(trim($_GET['req11_season']));
        $year = htmlspecialchars(trim($_GET['req11_year']));

        $sql = "SELECT * FROM `request`";
        $request = mysqli_query($db, $sql);

        $dates = [];

        echo '<div class="container">';
        while ($data = mysqli_fetch_array($request)) {
            $data['date'] = explode(' ', $data['date']);
            $data['date'][0] = explode('-', $data['date'][0]);

            $year = $data['date'][0][0];
            $month = $data['date'][0][1];
            $day = $data['date'][0][2];

            if ((int)$data['date'][0][0] === (int)$year) {
                switch ($season) {
                    case '1':
                        if ($month >= 1 && $month <= 3) {
                            getItemLine([
                                "ФИО: {$data['fio']}",
                                "Номер паспорта: {$data['passport']}",
                                "Телефон: {$data['phone']}",
                                "Дата: {$year}-{$month}-{$day}"
                            ]);
                        }
                        break;
                    case '2':
                        if ($month >= 3 && $month <= 6) {
                            getItemLine([
                                "ФИО: {$data['fio']}",
                                "Номер паспорта: {$data['passport']}",
                                "Телефон: {$data['phone']}",
                                "Дата: {$year}-{$month}-{$day}"
                            ]);
                        }
                        break;
                    case '3':
                        if ($month >= 6 && $month <= 9) {
                            getItemLine([
                                "ФИО: {$data['fio']}",
                                "Номер паспорта: {$data['passport']}",
                                "Телефон: {$data['phone']}",
                                "Дата: {$year}-{$month}-{$day}"
                            ]);
                        }
                        break;
                    case '4':
                        if ($month >= 9 && $month <= 12) {
                            getItemLine([
                                "ФИО: {$data['fio']}",
                                "Номер паспорта: {$data['passport']}",
                                "Телефон: {$data['phone']}",
                                "Дата: {$year}-{$month}-{$day}"
                            ]);
                        }
                        break;
                }
            }
        }
        echo '</div>';

    }
    else
        echo 'Заполните пустые поля';
}