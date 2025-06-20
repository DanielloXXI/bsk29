<?php
function wood()
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
            $data .= sprintf(
                '
                        <option value="%s">%s</option>
                    ',
                $associativeArray['wood'],
                $associativeArray['wood'],
            );
        }
        return $data;
    }
}
