<?php
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}
include("../server/connect.php");
$query = "DELETE FROM applications WHERE status LIKE 'отменена' OR status LIKE 'выполнена'";
mysqli_query($mysql, $query);
header('Location: ' . '../pages/admin.php');
