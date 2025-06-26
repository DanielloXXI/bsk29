<?php
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}
function applicationsSort($status)
{
    include("../server/connect.php");
    $data = '';
    if ($status) {
        $query = "SELECT * FROM (SELECT * FROM applications WHERE status='$status')AS current_applications INNER JOIN (SELECT id_user, email, FIO FROM users) AS user_data ON user_data.id_user = current_applications.id_user  
        ORDER BY `applications`.`date` DESC;";
        $res = mysqli_query($mysql, $query);
        $resArray = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $resArray[] = $row;
        }
        if ($resArray) {
            foreach ($resArray as $associativeArray) {
                $reason = '';
                if ($associativeArray['reason']) {
                    $reason = 'Причина: ' . $associativeArray['reason'] . '<br>';
                } else {
                    $reason = '';
                }
                $data .= sprintf(
                    '
                    <div class="card-body">
                        <h5 class="card-title">Заявка на %s</h5>
                        <p class="card-text">
                            Адрес: %s<br>
                            %s<br>
                            %s кубических см<br>
                            Фио: %s<br>
                            Тел: %s<br>
                            email: %s<br>
                            Оплата: %s<br>
                            Статус: %s<br>
                            %s
                        </p>
                        <form action="../server/application-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <div>
                                <select class="form-select" name="status" id="" style="width: 170px;" required>
                                    <option value="" disabled selected></option>
                                    <option value="в работе">В работе</option>
                                    <option value="выполнена">Выполнена</option>
                                    <option value="отменена">Отменена</option>
                                </select>
                                <div class="invalid-feedback">
                                    Выберите один из пунктов
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark h-100" style="opacity:0.7">Изменить статус</button>
                            <input type="hidden" name="id_application" value="%s">
                        </form>
                    </div>
                    <hr>
                    ',
                    $associativeArray['date'],
                    $associativeArray['address'],
                    $associativeArray['serviceType'],
                    $associativeArray['quantity'],
                    $associativeArray['FIO'],
                    $associativeArray['tel'],
                    $associativeArray['email'],
                    $associativeArray['payment'],
                    $associativeArray['status'],
                    $reason,
                    $associativeArray['id_application']
                );
            }
            return $data;
        } else {
            $data .= 'Заявок нет';
            return $data;
        }
    } else {
        $query = "SELECT * FROM applications INNER JOIN (SELECT id_user, email, FIO FROM users) AS user_data ON user_data.id_user = applications.id_user  
        ORDER BY `applications`.`date` DESC;";
        $res = mysqli_query($mysql, $query);
        $resArray = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $resArray[] = $row;
        }
        if ($resArray) {
            foreach ($resArray as $associativeArray) {
                $reason = '';
                if ($associativeArray['reason']) {
                    $reason = 'Причина: ' . $associativeArray['reason'] . '<br>';
                } else {
                    $reason = '';
                }
                $data .= sprintf(
                    '
                    <div class="card-body">
                        <h5 class="card-title">Заявка на %s</h5>
                        <p class="card-text">
                            Адрес: %s<br>
                            %s<br>
                            %s кубических см<br>
                            Фио: %s<br>
                            Тел: %s<br>
                            email: %s<br>
                            Оплата: %s<br>
                            Статус: %s<br>
                            %s
                        </p>
                        <form action="../server/application-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <div>
                                <select class="form-select" name="status" id="" style="width: 170px;" required>
                                    <option value="" disabled selected></option>
                                    <option value="в работе">В работе</option>
                                    <option value="выполнена">Выполнена</option>
                                    <option value="отменена">Отменена</option>
                                </select>
                                <div class="invalid-feedback">
                                    Выберите один из пунктов
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark h-100" style="opacity:0.7">Изменить статус</button>
                            <input type="hidden" name="id_application" value="%s">
                        </form>
                    </div>
                    <hr>
                    ',
                    $associativeArray['date'],
                    $associativeArray['address'],
                    $associativeArray['serviceType'],
                    $associativeArray['quantity'],
                    $associativeArray['FIO'],
                    $associativeArray['tel'],
                    $associativeArray['email'],
                    $associativeArray['payment'],
                    $associativeArray['status'],
                    $reason,
                    $associativeArray['id_application']
                );
            }
            return $data;
        } else {
            $data .= 'Заявок нет';
            return $data;
        }
    }
}
