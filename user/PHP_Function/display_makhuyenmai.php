<?php require_once("../../query.php");
session_start();
function chucnang()
{
    $action = $_POST['action'];
    $id_user = $_SESSION['iduser'];
    $sql = "SELECT * from khuyenmai_khachhang kmkh, makhuyenmai mkm where kmkh.makhuyenmai = mkm.id_khuyenmai and kmkh.manguoidung='$id_user'";
    switch ($action) {
        case 'search':
            $val = $_POST['val'];
            if (empty($val)) {
                display($sql);
            } else {
                $sql .= " and kmkh.makhuyenmai='$val'";
                display($sql);
            }
            break;
        case 'phantrang':
            display($sql);
            break;
        default:
    }
}
chucnang();
function display($query)
{
    $s = array('arr1' => '', 'arr2' => '');
    $temp = $query;
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $start = ($page - 1) * 10;
    $query .= " LIMIT $start, 10";
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $row) {
            $s['arr1'] .= '<tr>
            <th scope="row"> 
                <span>' . ++$start . '</span>
            </th>
            <td>
                <span>' . $row["id_khuyenmai"] . '</span>
            </td>
            <td>' . number_format($row["giamgia"]) . '</td>
            <td>' . date("d-m-Y", strtotime($row["ngayhethan"]))  . '</td>
            <td>' . ($row["trangthai"] == 1 ? 'Còn hạn' : 'Hết hạn') . '</td>
            <td>' . ($row["sudung"] == 1 ? 'Đã dùng' : 'Chưa dùng') . '</td>
        </tr>';
        }
        if ($_POST['action'] == 'search') {
            $s['arr2'] = '';
        } else {
            for ($i = 0; $i < ceil($result1 / 10); $i++) {
                if ($i == $page - 1) {
                    $s['arr2'] .= '<li class="page-item active"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
                } else $s['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
            }
        }
    } else {
        $s['arr1'] .= '<td colspan="4">Không tìm thấy</td>';
    }
    echo json_encode($s);
}
