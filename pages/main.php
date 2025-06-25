<?php
session_start();
include("../server/reviews-render.php");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.7-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../media/logo.png">
    <title>Беломорская сплавная компания</title>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-between py-3 mb-1">
            <div class="mb-2 mb-md-0">
                <a href="./main.php" class="d-inline-flex link-body-emphasis text-decoration-none align-items-center">
                    <img src="../media/logo.png" alt="Лого" width="60">
                    <span class="fs-4 ms-2 header__text">Беломорская сплавная компания</span>
                </a>
            </div>
            <ul class="nav mb-2 justify-content-center mb-md-0">
                <?php
                if (!array_key_exists('id_user', $_SESSION)) {
                    echo ('<li><a href="auth.php" class="btn btn-outline-warning me-2">Вход</a></li>
                <li><a href="reg.php" class="btn btn-outline-warning">Регистрация</a></li>');
                } else if (!array_key_exists('admin', $_SESSION)) {
                    echo ('<li><a href="../pages/review.php" class="btn btn-outline-warning me-1" title="Оставить отзыв">Оставить отзыв</a></li><li><a href="../pages/index.php" class="btn btn-outline-warning me-2" title="Мои заявки">Мои заявки</a></li><li><a href="../server/logout.php" class="btn btn-outline-warning" title="Выйти из аккаунта">Выход</a></li>');
                } else {
                    echo ('<li><a href="admin.php" class="btn btn-outline-warning me-2">Заявки</a></li><li><a href="admin-reviews.php" class="btn btn-outline-warning me-2">Отзывы</a></li>
                <li><a href="admin-wood.php" class="btn btn-outline-warning me-2">Дерево</a></li>
                <li><a href="../server/logout.php" class="btn btn-outline-warning" title="Выйти из аккаунта">Выход</a></li>');
                }
                ?>
            </ul>
        </header>
    </div>
    <main class="main">
        <section class="image">
            <div class="image__black"></div>
            <h1 class="image__title text-white text-center">Строим то, на чем работаем!</h1>
            <p class="image__subtitle text-white text-center"><b>В 2019 году компания начала развивать новое направление работы - судостроение и судоремонт</b></p>
        </section>
        <section class="programm">
            <div class="programm__statistics">
                <div class="programm__statistics-card">
                    <div class="programm__statistics-paragraph">
                        <span class="programm__statistics-number text-white">20</span>
                        <span class="programm__statistics-text text-white">плотов доставлено в 2024</span>
                    </div>
                </div>
                <div class="programm__statistics-card">
                    <div class="programm__statistics-paragraph">
                        <span class="programm__statistics-number text-white">215</span>
                        <span class="programm__statistics-text text-white">тысяч кубов леса</span>
                    </div>
                </div>
                <div class="programm__statistics-card">
                    <div class="programm__statistics-paragraph">
                        <span class="programm__statistics-text programm__statistics-text_more text-white">более</span>
                        <span class="programm__statistics-number text-white">450</span>
                        <span class="programm__statistics-text text-white">км длина пути</span>
                    </div>
                </div>
            </div>
            <div class="programm__text">
                <h2 class="programm__title text-white">ПЛОТОВАЯ ПРОГРАММА</h2>
                <span class="programm__paragraph text-white">Плотовая программа стартует в мае и длится в среднем двадцать дней. Доставка каждого плота настоящая логистическая операция.
                    Основную часть пути, а это более 450 километров, плот ведут два буксира. У южной границы порта Архангельск на помощь приходят ещё пять судов.
                    Их задача— контрольная проводка. Дополнительные теплоходы помогают маневрировать на изгибах дельты Северной Двины,
                    между опорами мостов и во время швартовки к месту стоянки.</span>
            </div>
            <div class="image__black"></div>
            </div>
        </section>
        <section class="reviews">
            <h2 class="reviews__title text-center text-white">Наши честные отзывы</h2>
            <div class="reviews__cards">
                <?php echo reviewsRender() ?>
            </div>
            <div class="image__black"></div>
        </section>
    </main>
    <script src="../scripts/script.js"></script>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
</body>

</html>