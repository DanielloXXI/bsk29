<?php
session_start();
include("../server/connect.php");
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
$id_user = $_SESSION['id_user'];
$text = $_POST['text'];
$mark = $_POST['mark'];
$stmt = $mysql->prepare("INSERT INTO reviews (`id_user`, `text`, `mark`) VALUES (?,?,?)");
$stmt->bind_param("isi", $id_user, $text, $mark);
$stmt->execute();
header('Location: ' . '../pages/index.php');
