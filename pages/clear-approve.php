<?php
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}
$id_user = $_SESSION['id_user'];
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
                <li><a href="admin.php" class="btn btn-outline-warning me-2">Заявки</a></li>
                <li><a href="admin-reviews.php" class="btn btn-outline-warning me-2">Отзывы</a></li>
                <li><a href="admin-wood.php" class="btn btn-outline-warning me-2">Дерево</a></li>
                <li><a href="../server/logout.php" class="btn btn-outline-warning" title='Выйти из аккаунта'>Выход</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <span class="h4 mb-0 ">Вы уверены?</span>
                    </div>
                    <div class="card-body d-flex justify-content-center gap-3">
                        <button class="btn btn-danger"><a href="../server/clear.php" class="text-decoration-none text-reset">Удалить данные</a></button>
                        <button class="btn btn-secondary"><a href="./admin.php" class="text-decoration-none text-reset">Вернуться</a></button>
                    </div>
                </div>
                <div class='alert alert-danger py-2 mt-2'>После удаления данные исчезнут навсегда</div>
        </main>
    </div>
    <script src="../scripts/cancel.js"></script>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>