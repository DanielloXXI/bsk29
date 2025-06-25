<?php
function reviewsRender()
{
    include("../server/connect.php");
    $data = '';
    $query = "SELECT text,mark,FIO FROM (SELECT text,mark,FIO,status FROM reviews INNER JOIN users ON reviews.id_user=users.id_user) AS viborka WHERE status='одобрен';";
    $res = mysqli_query($mysql, $query);
    $resArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $resArray[] = $row;
    }
    if ($resArray) {
        $resArray = array_slice(array_reverse($resArray), 0, 6);
        foreach ($resArray as $associativeArray) {
            $data .= sprintf(
                '
                    <div class="reviews__card">
                        <h4 class="reviews__card-title">%s</h4>
                        <p class="reviews__card-text text-center">
                            %s⭐
                        </p>
                        <p class="reviews__card-text text-center">
                            %s
                        </p>
                    </div>
                ',
                $associativeArray['FIO'],
                $associativeArray['mark'],
                $associativeArray['text'],
            );
        }
        return $data;
    }
}