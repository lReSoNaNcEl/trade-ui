<link rel="stylesheet" href="../css/default.css">

<aside>
    <h1>Поиск</h1>
    <div>
        <div><a href="../index.php">Главная</a></div>
        <div><a href="../requests/1.php">По районам</a></div>
        <div><a href="../requests/2.php">По заявке клиента</a></div>
        <div><a href="../requests/3.php">По типу дому</a></div>
        <div><a href="../requests/4.php">Не выше введенной стоимости</a></div>
        <div><a href="../requests/5.php">Средняя цена по количеству комнат</a></div>
        <div><a href="../requests/6.php">Не выше средней стоимости</a></div>
        <div><a href="../requests/7.php">Квартиры с 3 по 7 этажи</a></div>
        <div><a href="../requests/8.php">Мин./Макс./Сред. цены</a></div>
        <div><a href="../requests/9.php">Доход посредника</a></div>
        <div><a href="../requests/10.php">Цена с работой фирмы</a></div>
        <div><a href="../requests/11.php">Просмотр заявок</a></div>
    </div>
</aside>


<style>
    aside {
        float: left;
        height: 100vh;
        width: 20vw;
        background: #8118F9;
        border-right: 5px solid white;
        border-bottom: 5px solid white;
        display: flex;
        flex-direction: column-reverse;
        justify-content: space-around;
    }

    aside > h1 {
        text-align: center;
        text-transform: uppercase;
    }

    aside > div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-size: 1.25vw;
        text-align: center;
    }

    aside > div > div {
        margin: 5px 0 5px 0;
    }

    aside > div > div:first-child {
        font-size: 1.8vw;
    }

    a:hover {color: gold;}
</style>