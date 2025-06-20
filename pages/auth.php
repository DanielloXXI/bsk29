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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="icon" href="../media/logo.png">
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
                <li><a href="auth.php" class="btn btn-warning me-2">Вход</a></li>
                <li><a href="reg.php" class="btn btn-outline-warning">Регистрация</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-md-6 mx-auto">

                <form action="../server/server.php" method="post" class="border border-1 rounded p-4 needs-validation" novalidate>
                    <h2 class="mb-3">Авторизуйтесь</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Логин</label>
                        <input type="text" name="login" class="form-control" id="validationServer01" aria-describedby="emailHelp" minlength="3" required pattern='[0-9A-Za-z\s\-\w]{2,30}'>
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Специальные символы запрещены. Минимум 3 символа!
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" pattern='[0-9A-Za-z\s\-\w]{2,30}' required>
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Минимум 3 символа!
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Отправить</button>
                </form>
                <a href="../server/test.php?id=6"></a>
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
    <script src="../scripts/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>