<?php
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}
include("../server/connect.php");
if ($_POST['delete']) {
    $id_wood = $_POST['id_wood'];
    $res = mysqli_query($mysql, "DELETE FROM `wood` WHERE `wood`.`id_wood` = '$id_wood'");
    header('Location: ' . '../pages/admin-wood.php');
} else if ($_POST['add']) {
    $wood = $_POST['wood'];
    $res = mysqli_query($mysql, "INSERT INTO `wood` (`id_wood`, `wood`) VALUES (NULL, '$wood');");
    header('Location: ' . '../pages/admin-wood.php');
} else {
    $id_wood = $_POST['id_wood'];
    $wood = $_POST['wood'];
    $res = mysqli_query($mysql, "UPDATE `wood` SET `wood` = '$wood' WHERE `wood`.`id_wood` = '$id_wood'");
    header('Location: ' . '../pages/admin-wood.php');
}
