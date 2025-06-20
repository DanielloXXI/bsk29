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
                <li><a href="../server/logout.php" class="btn btn-warning" title='Выйти из аккаунта'>Выход</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="h4 mb-0">Ваши заявки</span>
                        <button class="btn btn-warning ms-auto"><a href="application.php" class="text-decoration-none text-reset" title="Оставить новую заявку">Новая заявка</a></button>
                    </div>
                    <?php
                    $query = "SELECT * FROM (SELECT * FROM applications WHERE id_user LIKE $id_user) AS user_applications INNER JOIN (SELECT id_user, email, FIO FROM users) AS user_data ON user_data.id_user = user_applications.id_user  
ORDER BY `user_applications`.`date` DESC";
                    $res = mysqli_query($mysql, $query);

                    $resArray = array();
                    while ($row = mysqli_fetch_assoc($res)) {
                        $resArray[] = $row;
                    }
                    foreach ($resArray as $associativeArray) {
                        echo <<< HERE
                            <div class="card-body">
                                <h5 class="card-title">Заявка на {$associativeArray['date']}</h5>
                                <p class="card-text">
                                    {$associativeArray['address']}<br>
                                    {$associativeArray['serviceType']}<br>
                        HERE;
                        echo <<< HERE
                                    Оплата: {$associativeArray['payment']}<br>
                                    Статус: {$associativeArray['status']}<br>
                        HERE;
                        if ($associativeArray['reason']) {
                            echo "Причина: " . $associativeArray['reason'];
                        }
                        echo    "</p>
                            </div>";
                    }
                    ?>

                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>