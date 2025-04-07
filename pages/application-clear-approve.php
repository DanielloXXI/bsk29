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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Беломорская сплавная компания</title>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
            <div class="mb-2 mb-md-0">
                <a href="./index.php" class="d-inline-flex link-body-emphasis text-decoration-none align-items-center">
                    <img src="../media/logo.png" alt="Лого" width="60">
                    <span class="fs-4 ms-2 header__text">Беломорская сплавная компания</span>
                </a>
            </div>
            <ul class="nav mb-2 justify-content-center mb-md-0">
                <li><a href="../server/logout.php" class="btn btn-warning" title='Выйти из аккаунта'>Logout</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <span class="h4 mb-0 ">Вы уверены?</span>
                    </div>
                    <div class="card-body d-flex justify-content-center gap-3">
                        <button class="btn btn-danger"><a href="../server/application-clear.php" class="text-decoration-none text-reset">Удалить данные</a></button>
                        <button class="btn btn-secondary"><a href="./admin.php" class="text-decoration-none text-reset">Вернуться</a></button>
                    </div>
                </div>
                <div class='alert alert-danger py-2 mt-2'>После удаления данные исчезнут навсегда</div>
        </main>
    </div>
    <script src="../scripts/cancel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>