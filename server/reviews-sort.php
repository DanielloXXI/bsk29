<?php
function reviewsSort($status)
{
    include("../server/connect.php");
    $data = '';
    if ($status) {
        $query = "SELECT * FROM (SELECT * FROM reviews WHERE status='$status')AS current_reviews INNER JOIN (SELECT id_user, email, FIO FROM users) AS user_data ON user_data.id_user = current_reviews.id_user;";
        $res = mysqli_query($mysql, $query);
        $resArray = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $resArray[] = $row;
        }
        if ($resArray) {
            foreach ($resArray as $associativeArray) {
                $data .= sprintf(
                    '
                    <div class="card-body">
                        <h5 class="card-title">%s</h5>
                        <p class="card-text">
                            %s
                        </p>
                        <form action="../server/application-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <div>
                                <select class="form-select" name="status" id="" style="width: 170px;" required>
                                    <option value="" disabled selected></option>
                                    <option value="в работе">На рассмотрении</option>
                                    <option value="выполнена">Одобрен</option>
                                    <option value="отменена">Удалён</option>
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
                    $associativeArray['name'],
                    $associativeArray['text'],
                    $associativeArray['id_reviews']
                );
            }
            return $data;
        } else {
            $data .= 'Отзывов нет';
            return $data;
        }
    } else {
        $query = "SELECT * FROM reviews INNER JOIN (SELECT id_user, email, FIO FROM users) AS user_data ON user_data.id_user = reviews.id_user;";
        $res = mysqli_query($mysql, $query);
        $resArray = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $resArray[] = $row;
        }
        if ($resArray) {
            foreach ($resArray as $associativeArray) {
                $data .= sprintf(
                    '
                    <div class="card-body">
                        <h5 class="card-title">%s</h5>
                        <p class="card-text">
                            %s
                        </p>
                        <form action="../server/application-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <div>
                                <select class="form-select" name="status" id="" style="width: 170px;" required>
                                    <option value="" disabled selected></option>
                                    <option value="в работе">На рассмотрении</option>
                                    <option value="выполнена">Одобрен</option>
                                    <option value="отменена">Удалён</option>
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
                    $associativeArray['name'],
                    $associativeArray['text'],
                    $associativeArray['id_reviews']
                );
            }
            return $data;
        } else {
            $data .= 'Отзывов нет';
            return $data;
        }
    }
}
