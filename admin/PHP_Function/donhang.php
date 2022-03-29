<?php
require_once('../../query.php');

// lay danh sach don hang
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'displaydonhang') {
        $arr = array('arr1' => '', 'tongdon' => 0, 'choxacnhan' => 0, 'daxacnhan' => 0, 'danggiao' => 0, 'dagiao' => 0, 'dahuy' => 0);
        $sql = "SELECT * FROM hoadon";
        $result = executeResult($sql);
        foreach ($result as $row) {
            $arr['arr1'] .= ' <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
            </th>
            <td>' . $row['id_hoadon'] . '</td>
            <td>' . $row['ngaymua'] . '</td>
            <td>' . number_format($row['total_product']) . '</td>
            <td>' . number_format($row['total_money']) . '</td>
            <td>' . $row['statuss'] . '</td>';

            if ($row['statuss'] == 'Đã xác nhận') {
                $arr['arr1'] .= '<td>
                <a class="btn btn-danger btn-sm">Hủy đơn</a>
                <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Đã giao') {
                $arr['arr1'] .= '<td>
                <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Chờ xác nhận') {
                $arr['arr1'] .= '<td>
                <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
                 <a class="btn btn-danger btn-sm">Hủy đơn</a>
                 <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }
            if ($row['statuss'] == 'Đang giao') {
                $arr['arr1'] .= '<td>
                 <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Đã hủy') {
                $arr['arr1'] .= '<td>
                 <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }
        }
        $arr['tongdon'] = countRow($sql);
        $arr['choxacnhan'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Chờ xác nhận'");
        $arr['daxacnhan'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã xác nhận'");
        $arr['danggiao'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đang giao'");
        $arr['dagiao'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã giao'");
        $arr['dahuy'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã hủy'");
        echo json_encode($arr);
    }
}

if (isset($_POST['search'])) {

    $arr = array('arr1' => '', 'tongdon' => 0, 'choxacnhan' => 0, 'daxacnhan' => 0, 'danggiao' => 0, 'dagiao' => 0, 'dahuy' => 0);
    $val = $_POST['value'];
    if ($val == 'Tổng đơn') {
        $sql = "SELECT * FROM hoadon";
    } else $sql = "SELECT * FROM hoadon where `statuss` = '{$val}'";

    //die($sql );
    $result = executeResult($sql);
    foreach ($result as $row) {
        $arr['arr1'] .= ' <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
            </th>
            <td>' . $row['id_hoadon'] . '</td>
            <td>' . $row['ngaymua'] . '</td>
            <td>' . number_format($row['total_product']) . '</td>
            <td>' . number_format($row['total_money']) . '</td>
            <td>' . $row['statuss'] . '</td>';

        if ($row['statuss'] == 'Đã xác nhận') {
            $arr['arr1'] .= '<td>
                <a class="btn btn-danger btn-sm">Hủy đơn</a>
                <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }

        if ($row['statuss'] == 'Đã giao') {
            $arr['arr1'] .= '<td>
                <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }

        if ($row['statuss'] == 'Chờ xác nhận') {
            $arr['arr1'] .= '<td>
                <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
                 <a class="btn btn-danger btn-sm">Hủy đơn</a>
                 <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }
        if ($row['statuss'] == 'Đang giao') {
            $arr['arr1'] .= '<td>
                 <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }

        if ($row['statuss'] == 'Đã giao') {
            $arr['arr1'] .= '<td>
                 <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }
    }
    $arr['tongdon'] = countRow($sql);
    $arr['choxacnhan'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Chờ xác nhận'");
    $arr['daxacnhan'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã xác nhận'");
    $arr['danggiao'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đang giao'");
    $arr['dagiao'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã giao'");
    $arr['dahuy'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã hủy'");
    echo json_encode($arr);
}

// tìm kiếm đơn hàng
if (isset($_GET['key'])) {
    $key = $_GET['key'];
    $sql = "SELECT * FROM hoadon WHERE id_hoadon LIKE '%$key%'";
    $result = executeResult($sql);
    if ($result) {
        foreach ($result as $row) {
            echo '<tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            </div>
        </th>
        <td>' . $row['id_hoadon'] . '</td>
        <td>' . $row['ngaymua'] . '</td>
        <td>' . number_format($row['total_product']) . '</td>
        <td>' . number_format($row['total_money']) . '</td>
        <td>' . $row['statuss'] . '</td>
        <td>
            <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
            <a class="btn btn-danger btn-sm">Hủy đơn</a>
            <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
        </td>
        </tr>';
        }
    } else echo "Không tìm thấy đơn hàng";
}

// xác nhận đơn hàng
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'confirm') {
        $id = $_POST['id'];
        $sql = "UPDATE hoadon SET statuss='Đã xác nhận' WHERE id_hoadon='$id'";
        $result = execute($sql);
    }
}

if (isset($_POST['timkiemma'])) {
    $val = $_POST['value'];
    if (empty($val)) {
        $sql = "SELECT * FROM hoadon";
    } else $sql = "SELECT * FROM hoadon WHERE id_hoadon={$val}";
    
    if(countRow($sql)>0){
        $row = executeSingleResult($sql);
        echo ' <tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            </div>
        </th>
        <td>' . $row['id_hoadon'] . '</td>
        <td>' . $row['ngaymua'] . '</td>
        <td>' . number_format($row['total_product']) . '</td>
        <td>' . number_format($row['total_money']) . '</td>
        <td>' . $row['statuss'] . '</td>';

        if ($row['statuss'] == 'Đã xác nhận') {
            echo  '<td>
            <a class="btn btn-danger btn-sm">Hủy đơn</a>
            <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }

        if ($row['statuss'] == 'Đã giao') {
            echo '<td>
            <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }

        if ($row['statuss'] == 'Chờ xác nhận') {
            echo '<td>
            <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
             <a class="btn btn-danger btn-sm">Hủy đơn</a>
             <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }
        if ($row['statuss'] == 'Đang giao') {
            echo '<td>
             <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }

        if ($row['statuss'] == 'Đã hủy') {
            echo '<td>
             <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }
    }echo 'Không tìm thấy';
}
// xác nhận đơn hàng
if (isset($_POST['status'])) {
    $val = $_POST['value'];
    if ($val == 'Tổng đơn') {
        $sql = "SELECT * FROM `hoadon`";
    } else $sql = "SELECT * FROM `hoadon` WHERE `statuss`='{$val}'";
    $result = executeResult($sql);
    foreach ($result as $row) {
        echo ' <tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            </div>
        </th>
        <td>' . $row['id_hoadon'] . '</td>
        <td>' . $row['ngaymua'] . '</td>
        <td>' . number_format($row['total_product']) . '</td>
        <td>' . number_format($row['total_money']) . '</td>
        <td>' . $row['statuss'] . '</td>';

        if ($row['statuss'] == 'Đã xác nhận') {
            echo  '<td>
            <a class="btn btn-danger btn-sm">Hủy đơn</a>
            <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }

        if ($row['statuss'] == 'Đã giao') {
            echo '<td>
            <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }

        if ($row['statuss'] == 'Chờ xác nhận') {
            echo '<td>
            <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
             <a class="btn btn-danger btn-sm">Hủy đơn</a>
             <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }
        if ($row['statuss'] == 'Đang giao') {
            echo '<td>
             <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }

        if ($row['statuss'] == 'Đã hủy') {
            echo '<td>
             <a class="btn btn-info btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
            </td>
        </tr>';
        }
    }
}
