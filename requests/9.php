<?php
require('../connect.php');
require('../functions.php');
require('../layout/navmenu_requests.php');

?>

    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/record.css">

    <h2>Рассчет дохода фирмы посредника от проданных квартир (10% от стоимости каждой квартиры)</h2>
    <form action="9.php" method="GET">
        <input type="submit" name="req_9" value="Рассчитать">
    </form>

<?php

if (isset($_GET['req_9'])) {

    $sql = "SELECT * FROM `flat` WHERE `is_sold` = 'yes'";
    $request = mysqli_query($db, $sql);

    if (!empty(mysqli_num_rows($request))) {
        while ($data = mysqli_fetch_array($request)) {
            $income += $data['price'] * 0.1;
        }
    }
    echo '<div class="container">';
    getItemLine([
        "<h2 style='margin: 0; padding: 0;'>
            Результат: {$income} руб.
        </h2>"
    ]);
    echo '</div>';


}