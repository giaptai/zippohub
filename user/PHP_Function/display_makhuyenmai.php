<?php
require_once("../../query.php");
session_start();

chucnang();
function chucnang()
{
    $action = $_POST['action'];
    $id_user = $_SESSION['iduser'];
    $sql = "SELECT * from makhuyenmai where id_user='$id_user'";
    switch ($action) {
        case 'search':
            $val = $_POST['val'];
            if (empty($val)) {
                display($sql);
            } else {
                $sql .= " and id_khuyenmai='$val'";
                display($sql);
            }
            break;

        case 'phantrang':
            display($sql);
            break;

        default:
    }
}

function display($query){
    $s = array('arr1' => '', 'arr2' => '');
    $temp = $query;
    $page = isset($_POST['page']) ? $_POST['page']:1;
    $start = ($page - 1) * 10;
    $query .= " LIMIT $start, 10";
    //echo die($query);
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $row) {
            $s['arr1'] .= '<tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $row["id_khuyenmai"] . '">
                    <span>' . ++$start . '</span>
                </div>
            </th>
            <td>
                <span>' . $row["id_khuyenmai"] . '</span>
            </td>
            <td>' . number_format($row["giamgia"]) . '</td>
            <td>' . $row["ngayhethan"] . '</td>
        </tr>';
        }
        for ($i = 0; $i < ceil($result1 / 10); $i++) {
            if ($i == $page-1 ) {
                $s['arr2'] .= '<li class="page-item active"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
            } else $s['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
        }
    } else {
        $s['arr1'] .= '<td colspan="4">Không tìm thấy</td>';
    }
    echo json_encode($s);
}
