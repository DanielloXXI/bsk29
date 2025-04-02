<?php
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}
include("../server/connect.php");
$id_user = $_SESSION['id_user'];
$status = $_POST['status'];
$id_application = $_POST['id_application'];
if (array_key_exists('reason', $_POST)) {
    $reason = $_POST['reason'];
    $res = mysqli_query($mysql, "UPDATE `applications` SET `status` = '$status', `reason` = '$reason' WHERE `applications`.`id_application` = '$id_application'");
    header('Location: ' . '../pages/admin.php');
} else {
    $res = mysqli_query($mysql, "UPDATE `applications` SET `status` = '$status', `reason` = NULL WHERE `applications`.`id_application` = '$id_application'");
    header('Location: ' . '../pages/admin.php');
}
