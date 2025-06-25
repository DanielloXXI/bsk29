<?php
function wood($param)
{
    include("../server/connect.php");
    $data = '';
    $query = "SELECT * FROM wood";
    $res = mysqli_query($mysql, $query);
    $resArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $resArray[] = $row;
    }
    if ($resArray) {
        foreach ($resArray as $associativeArray) {
            if ($param) {
                $data .= sprintf(
                    '
                        <h5 class="card-title">%s</h5>
                        <form action="../server/wood-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <div>
                                <input type="text" class="form-control" name="wood" id="wood" style="width: 170px;" required minlength="2"></input>
                                <div class="invalid-feedback">
                                    Поле должно содержать не менее 2 символов!
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark h-100" style="opacity:0.7">Изменить название</button>
                            <input type="hidden" name="id_wood" value="%s">
                        </form>
                        <form action="../server/wood-change-status.php" method="post" class="d-flex justify-content-between flex-wrap gap-3 needs-validation" novalidate>
                            <button type="submit" class="btn btn-danger h-100 mt-2" style="opacity:0.7">Удалить</button>
                            <input type="hidden" name="delete" value="delete">
                            <input type="hidden" name="id_wood" value="%s">
                        </form>
                    <hr>
                    ',
                    $associativeArray['wood'],
                    $associativeArray['id_wood'],
                    $associativeArray['id_wood'],
                );
            } else {
                $data .= sprintf(
                    '
                        <option value="%s">%s</option>
                    ',
                    $associativeArray['wood'],
                    $associativeArray['wood'],
                );
            }
        }
        return $data;
    }
}
