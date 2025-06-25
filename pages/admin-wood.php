<?php
include("../server/wood.php");
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}

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
                <li><a href="admin-wood.php" class="btn btn-warning me-2">Дерево</a></li>
                <li><a href="../server/logout.php" class="btn btn-outline-warning" title='Выйти из аккаунта'>Выход</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="h4 mb-0">Дерево</span>
                    </div>
                    <div class="card-body">
                        <?php echo wood('admin-wood') ?>
                        <form action="../server/wood-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <div>
                                <input type="text" class="form-control" name="wood" id="wood" style="width: 170px;" required minlength="2"></input>
                                <div class="invalid-feedback">
                                    Поле должно содержать не менее 2 символов!
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning h-100">Добавить дерево</button>
                            <input type="hidden" name="add" value="add">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../scripts/cancel.js"></script>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>