<?php
session_start();

include("../server/connect.php");

if (!array_key_exists('auth', $_SESSION)) {
    // Регистрация
    if (($_POST['source'] === "reg")) {

        $login = $_POST['login'];
        $password = hash('sha256', $_POST['password']);
        $FIO = $_POST['FIO'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        // Проверка на повтор логинов и почт
        $query = "SELECT * FROM users WHERE login='$login'";
        $query2 = "SELECT * FROM users WHERE email='$email'";
        $res = mysqli_query($mysql, $query);
        $res2 = mysqli_query($mysql, $query2);
        $user = mysqli_fetch_assoc($res);
        $user2 = mysqli_fetch_assoc($res2);
        if (!empty($user)) {
            $_SESSION["response"] = "Данный логин уже занят";
            header('Location: ' . '../pages/reg.php');
            exit();
        }
        if (!empty($user2)) {
            $_SESSION["response"] = "Данная почта уже занята";
            header('Location: ' . '../pages/reg.php');
            exit();
        }


        $stmt = $mysql->prepare("INSERT INTO users (`login`, `password`,`FIO`,`tel`,`email`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $login, $password, $FIO, $tel, $email);
        $stmt->execute();
        $_SESSION['auth'] = true;
        $_SESSION['id_user'] = $mysql->insert_id;
        header('Location: ' . '../pages/index.php');
        exit();
    }

    // Авторизация
    else {
        if (empty($_POST['password']) or empty($_POST['login'])) {
            $_SESSION["response"] = "Заполните поля формы";
            header('Location: ' . '../pages/auth.php');
            exit();
        }

        // Авторизация
        $login = $_POST['login'];
        $password = hash('sha256', $_POST['password']);
        // Точное совпадение
        $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $res = mysqli_query($mysql, $query);
        $user = mysqli_fetch_assoc($res);
        echo $user['login'];
        if (!empty($user)) {
            $_SESSION['auth'] = true;
            if ($user['login'] === "adminka") {
                $_SESSION["admin"] = true;
                $_SESSION['id_user'] = $user['id_user'];
                // id user для проверки на вход админа
                unset($_SESSION["response"]);
                header('Location: ' . '../pages/admin.php');
                exit();
            } else {
                $_SESSION['id_user'] = $user['id_user'];
                unset($_SESSION["response"]);
                header('Location: ' . '../pages/index.php');
                exit();
            }
        }
        // Частичное совпадение
        $query = "SELECT * FROM users WHERE login='$login' OR password='$password'";
        $res = mysqli_query($mysql, $query);
        $user = mysqli_fetch_assoc($res);
        if (!empty($user)) {
            $_SESSION["response"] = "Логин или пароль введён неверно";
            header('Location: ' . '../pages/auth.php');
            exit();
        } else {
            $_SESSION["response"] = "Такого пользователя нет. Зарегистрируйтесь";
            header('Location: ' . '../pages/auth.php');
            exit();
        }
    }
} else {
    $_SESSION["response"] = "Вы уже вошли в учётную запись";
    header('Location: ' . '../pages/index.php');
}


// 
