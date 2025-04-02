<?php
session_start();
include("../server/connect.php");
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}

$id_user = $_SESSION['id_user'];
$serviceType = $_POST['select'];
$id_user = $_SESSION['id_user'];
$radio = $_POST['flexRadioDefault2'];
$date = $_POST['datetime'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$quantity = $_POST['quantity'];

$stmt = $mysql->prepare("INSERT INTO applications (`id_user`,`address`, `tel`,`date`,`serviceType`,`payment`,`quantity`) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("issssss", $id_user, $address, $tel, $date, $serviceType, $radio, $quantity);
$stmt->execute();
header('Location: ' . '../pages/index.php');
