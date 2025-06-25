<?php
include("../server/reviews-sort.php");
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
                <li><a href="admin-reviews.php" class="btn btn-warning me-2">Отзывы</a></li>
                <li><a href="admin-wood.php" class="btn btn-outline-warning me-2">Дерево</a></li>
                <li><a href="../server/logout.php" class="btn btn-outline-warning" title='Выйти из аккаунта'>Выход</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="nav nav-pills" id="v-pills-tab" role="tablist">
                    <button class="nav-link active" id="tabbtn1" data-bs-toggle="pill" data-bs-target="#all-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Вcе отзывы</button>
                    <button class="nav-link" id="tabbtn2" data-bs-toggle="pill" data-bs-target="#process-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">На рассмотрении</button>
                    <button class="nav-link" id="tabbtn3" data-bs-toggle="pill" data-bs-target="#cancel-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Одобрен</button>
                    <button class="nav-link" id="tabbtn4" data-bs-toggle="pill" data-bs-target="#approved-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Удалён</button>
                </div>

                <div class="tab-content mt-4">
                    <div class="tab-pane fade active show" id="all-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Отзывы</span>
                                <button class="btn btn-warning ms-auto"><a href="./reviews-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все отзывы со статусами "удалён"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo reviewsSort('') ?></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cancel-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Отзывы</span>
                                <button class="btn btn-warning ms-auto"><a href="./reviews-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все отзывы со статусами "удалён"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo reviewsSort('одобрен') ?></div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="process-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Отзывы</span>
                                <button class="btn btn-warning ms-auto"><a href="./reviews-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все отзывы со статусами "удалён"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo reviewsSort('на рассмотрении') ?></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="approved-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Отзывы</span>
                                <button class="btn btn-warning ms-auto"><a href="./reviews-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все отзывы со статусами "удалён"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo reviewsSort('удалён') ?></div>

                        </div>
                    </div>
                </div>
        </main>
    </div>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>