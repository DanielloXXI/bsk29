<?php
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/admin.php');
}
include("../server/connect.php");
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
                <li><a href="../pages/review.php" class="btn btn-warning me-1" title="Мои заявки">Оставить отзыв</a></li>
                <li><a href="../pages/index.php" class="btn btn-outline-warning me-1" title="Мои заявки">Мои заявки</a></li>
                <li><a href="../server/logout.php" class="btn btn-outline-warning" title='Выйти из аккаунта'>Выход</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-md-6 mx-auto">
                <div class="card">
                    <form action="../server/review.php" class="border border-1 rounded p-4 needs-validation" name="review" novalidate method="post">
                        <h2 class="mb-3">Оставить отзыв</h2>
                        <label for="text" class="d-block">Опишите свой опыт</label>
                        <textarea id="text" name="text" class="form-control"></textarea>
                        <label for="mark" class="d-block">Поставьте оценку</label>
                        <select name="mark" id="mark" class="mb-2 form-select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button type="submit" class="btn btn-warning">Отправить</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>