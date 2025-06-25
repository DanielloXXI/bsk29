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
$id_reviews = $_POST['id_reviews'];
$res = mysqli_query($mysql, "UPDATE `reviews` SET `status` = '$status' WHERE `reviews`.`id_reviews` = '$id_reviews'");
header('Location: ' . '../pages/admin-reviews.php');