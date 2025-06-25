<?php
session_start();

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
        <header class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
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
                    echo ('<li><a href="../pages/index.php" class="btn btn-outline-warning me-1" title="Мои заявки">Мои заявки</a></li><li><a href="../server/logout.php" class="btn btn-outline-warning" title="Выйти из аккаунта">Выход</a></li>');
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
                <div class="programm_statistics">
                    <div class="programm_statistics-paragraph">

                    </div>
                </div>
        </section>
    </main>

    <script src="../scripts/script.js"></script>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
</body>

</html>