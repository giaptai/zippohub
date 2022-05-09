<?php require_once('../../query.php');
chucnang();
function chucnang()
{
    $action = $_POST['action'];
    $sql = "SELECT * FROM hoadon";
    switch ($action) {
        case 'trangthai':
            $val = $_POST['value'];
            if ($val == 'Tổng đơn') {
                display($sql);
            } else {
                $sql .= " WHERE statuss='{$val}'";
                display($sql);
            }
            break;
        case 'phantrang':
            $val = $_POST['value'];
            if ($val == 'Tổng đơn') {
                display($sql);
            } else {
                $sql .= " WHERE statuss='{$val}'";
                display($sql);
            }
            break;
        case 'timkiemma':
            $id = $_POST['id'];
            if (!empty($id) || $id == 0) {
                $sql .= " WHERE id_hoadon={$id}";
                display($sql);
            } else {
                display($sql);
            }
            break;
        default:
            break;
    }
}

function display($query)
{
    $arr = array('arr1' => '', 'arr2' => '');
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $start = ($page - 1) * 10;
    $temp = $query;
    $query .= " ORDER BY `statuss` ASC,`ngaymua` DESC LIMIT $start, 10";
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $row) {
            $arr['arr1'] .= ' <tr>
            <th scope="row">
                <span>' . ++$start . '</span>
            </th>
            <td>' . $row['id_hoadon'] . '</td>
            <td>' . date("d-m-Y H:i:s", strtotime($row['ngaymua'])) . '</td>
            <td>' . number_format($row['total_product']) . '</td>
            <td>' . number_format($row['total_money']) . '</td>';

            if ($_POST['action'] == 'timkiemma') {
                $arr['arr2'] = '';
                $arr['arr1'] .= '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td><a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a></td>';
                echo json_encode($arr);
                die();
            } else {
                if ($row['statuss'] == 'Đã xác nhận') {
                    $arr['arr1'] .= '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                    <td>
                        <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row["id_hoadon"] . ', `Đang giao`, this)">Đang giao</a>
                        <a class="btn text-danger btn-sm fa-solid fa-xmark fs-4" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)"></a>
                        <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a>
                    </td>
                    </tr>';
                }

                if ($row['statuss'] == 'Đã giao') {
                    $arr['arr1'] .= '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
                    <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a>
                    </td>
                    </tr>';
                }

                if ($row['statuss'] == 'Chờ xác nhận') {
                    $arr['arr1'] .= '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                    <td>
                    <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã xác nhận`, this)">Xác nhận</a>
                    <a class="btn text-danger btn-sm fa-solid fa-xmark fs-4" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)"></a>
                    <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a>
                    </td>
                    </tr>';
                }
                if ($row['statuss'] == 'Đang giao') {
                    $arr['arr1'] .= '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                    <td>
                    <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã giao`, this)">Đã giao</a>
                    <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a>
                    </td>
                    </tr>';
                }

                if ($row['statuss'] == 'Đã hủy') {
                    $arr['arr1'] .= '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                    <td>
                    <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a>
                    </td>
                    </tr>';
                }
            }
        }
        // if ($_POST['action'] == 'timkiemma') {
        //     $arr['arr2'] = '';
        // } else {
        for ($i = 0; $i < ceil($result1 / 10); $i++) {
            if ($i == $page - 1) {
                $arr['arr2'] .= '<li class="page-item active"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            } else $arr['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
        // }
    } else {
        $arr['arr1'] = '<td colspan="7">Không tìm thấy</td>';
    }
    echo json_encode($arr);
}

if (isset($_POST['thaotacdon'])) {
    $act = $_POST['act'];
    $id = $_POST['id'];
    $sql = "UPDATE hoadon SET statuss='" . $act . "' WHERE id_hoadon='" . $id . "'";
    $result = execute($sql);
    echo $sql;
    die();
}
