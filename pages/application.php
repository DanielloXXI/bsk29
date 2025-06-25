<?php
include("../server/wood.php");
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
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
                <li><a href="../pages/review.php" class="btn btn-outline-warning me-1" title="Оставить отзыв">Оставить отзыв</a></li>
                <li><a href="../pages/index.php" class="btn btn-outline-warning me-1" title="Мои заявки">Мои заявки</a></li>
                <li><a href="../server/logout.php" class="btn btn-outline-warning" title='Выйти из аккаунта'>Выход</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-lg-6 mx-auto">
                <form action="../server/application-create.php" class="border border-1 rounded p-4 needs-validation" name="application" method="post" novalidate>
                    <h2 class="mb-3">Формирование заявки</h2>
                    <div class="mb-3">
                        <label for="exampleInputAdress1" class="form-label">Адрес</label>
                        <input type="text" name="address" class="form-control" id="exampleInputAdress1" aria-describedby="adressHelp" pattern="[А-Яа-яЁё0-9.,\w\s]{5,200}" required>
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Введите адрес
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTel" class="form-label">Телефон</label>
                        <input type="tel" name="tel" class="form-control" id="exampleInputTel1" aria-describedby="telHelp" required pattern="\+7[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" placeholder="Формат: +79998886655">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Введите корректный телефон в формате: +79998887766
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDate1" class="form-label">Дата и время</label>
                        <input type="datetime-local" name="datetime" class="form-control" id="exampleInputDatetime1" required min="<?php echo substr(date("c", time()), 0, 16); ?>" max="<?php echo substr(date("c", time() + 2629743), 0, 16); ?>">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Введите корректные дату и время
                        </div>
                    </div>
                    <div>
                        <label for="exampleInputDate1" class="form-label">Дерево</label>
                        <select class="form-select mb-2" name="select" id="" required>
                            <?php echo wood('') ?>
                        </select>
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Выберите значение из списка
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputQuantity" class="form-label">Количество</label>
                        <input type="number" name="quantity" class="form-control" id="exampleInputQuantity1" aria-describedby="quantityHelp" required placeholder="Введите количество в кубических сантиметрах">
                        <div class="valid-feedback">
                            Всё верно!
                        </div>
                        <div class="invalid-feedback">
                            Введите количество в кубических сантиметрах
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="exampleInputTel" class="form-label">Предпочтительный тип оплаты</label>
                        <div class="d-flex mb-3 ">
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault6" value="банковская карта" required>
                                <label class="form-check-label" for="flexRadioDefault6">
                                    Банковская карта
                                </label>
                                <div class="valid-feedback">
                                    Всё верно!
                                </div>
                                <div class="invalid-feedback">
                                    Выберите способ оплаты!
                                </div>
                            </div>
                            <div class="ms-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault7" value="наличные" required>
                                <label class="form-check-label" for="flexRadioDefault7">
                                    Наличные
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Отправить</button>
                </form>
            </div>
        </main>
    </div>
    <script src="../bootstrap-5.3.7-dist/js/bootstrap.js"></script>
    <script src="../scripts/script.js"></script>
</body>

</html>