<?php
session_start();
if (array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}
if (array_key_exists('admin', $_SESSION)) {
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
                <li><a href="auth.php" class="btn btn-outline-warning me-2">Вход</a></li>
                <li><a href="reg.php" class="btn btn-warning">Регистрация</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-md-6 mx-auto">
                <form action="../server/server.php" class="border border-1 rounded p-4 needs-validation" name="reg" method="post" novalidate>
                    <h2 class="mb-3">Регистрация</h2>
                    <div class="mb-3">
                        <label for="exampleInputLogin1" class="form-label">Логин</label>
                        <input type="text" name="login" class="form-control" id="exampleInputLogin1" aria-describedby="loginHelp" required pattern="[0-9A-Za-z\s\-\w]{3,25}" maxlength="25" minlength="3">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Логин должен содержать от 3 до 25 символов!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required minlength="6">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Пароль должен содержать не менее 6 символов!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputFIO" class="form-label">ФИО</label>
                        <input type="text" name="FIO" class="form-control" id="FIO" aria-describedby="nameHelp" required pattern="[А-Яа-яЁё\s\-]{2,50}">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            ФИО должно быть написано кириллицей, а также содержать от 2 до 50 символов!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTel" class="form-label">Телефон</label>
                        <input type="tel" name="tel" class="form-control" id="exampleInputTel1" aria-describedby="telHelp" required pattern="\+7[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" placeholder="Формат: +79998886655">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Введите корректный телефон в формате: +79998886655!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Почта</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Введите корректную почту!
                        </div>
                    </div>
                    <input type="hidden" name="source" value="reg" id="">
                    <button type="submit" class="btn btn-warning">Отправить</button>
                </form>
                <?php
                if (array_key_exists('response', $_SESSION)) {
                    echo <<< HERE
                            <div class='alert alert-danger py-2 mt-2'>{$_SESSION['response']}</div>       
                        HERE;
                }
                unset($_SESSION["response"]);
                ?>
            </div>
        </main>
    </div>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>