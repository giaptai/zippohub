<?php
require_once('../../query.php');

// lay danh sach don hang
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'displaydonhang') {
        $arr = array('arr1' => '', 'tongdon' => 0, 'choxacnhan' => 0, 'daxacnhan' => 0, 'danggiao' => 0, 'dagiao' => 0, 'dahuy' => 0);
        $sql = "SELECT * FROM hoadon ORDER BY `hoadon`.`statuss`  ASC";
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
            <td>' . number_format($row['total_money']) . '</td>';


            if ($row['statuss'] == 'Đã xác nhận') {
                $arr['arr1'] .= '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row["id_hoadon"] . ', `Đang giao`, this)">Đang giao</a>
                    <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)">X</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Đã giao') {
                $arr['arr1'] .= '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Chờ xác nhận') {
                $arr['arr1'] .= '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã xác nhận`, this)">Xác nhận</a>
                    <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)">X</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
                </td>
            </tr>';
            }
            if ($row['statuss'] == 'Đang giao') {
                $arr['arr1'] .= '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã giao`, this)">Đã giao</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Đã hủy') {
                $arr['arr1'] .= '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
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

/*
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
            <td>' . number_format($row['total_money']) . '</td>';


        if ($row['statuss'] == 'Đã xác nhận') {
            $arr['arr1'] .= '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="cancelOrder(' . $row['id_hoadon'] . ')">Hủy đơn</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }

        if ($row['statuss'] == 'Đã giao') {
            $arr['arr1'] .= '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }

        if ($row['statuss'] == 'Chờ xác nhận') {
            $arr['arr1'] .= '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
                    <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="cancelOrder(' . $row['id_hoadon'] . ')">Hủy đơn</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }
        if ($row['statuss'] == 'Đang giao') {
            $arr['arr1'] .= '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }

        if ($row['statuss'] == 'Đã hủy') {
            $arr['arr1'] .= '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
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
*/


/*
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
        <td>' . number_format($row['total_money']) . '</td>';
            if ($row['statuss'] == 'Đã xác nhận') {
                echo '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="cancelOrder(' . $row['id_hoadon'] . ')">Hủy đơn</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Đã giao') {
                echo '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Chờ xác nhận') {
                echo '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-success btn-sm" id="id' . $row['id_hoadon'] . '" onclick="confirm(' . $row['id_hoadon'] . ')">Xác nhận</a>
                    <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="cancelOrder(' . $row['id_hoadon'] . ')">Hủy đơn</a>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }
            if ($row['statuss'] == 'Đang giao') {
                echo '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }

            if ($row['statuss'] == 'Đã hủy') {
                echo '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
            }
        }
    } else echo "Không tìm thấy đơn hàng";
}
*/

if (isset($_POST['timkiemma'])) {
    $val = $_POST['value'];
    if (empty($val)) {
        $sql = "SELECT * FROM hoadon ORDER BY `hoadon`.`statuss`  ASC";
    } else $sql = "SELECT * FROM hoadon WHERE id_hoadon={$val}";
    // echo $val, $sql;
    // die();
    if (countRow($sql) > 0) {
        $result = executeResult($sql);
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
        <td>' . number_format($row['total_money']) . '</td>';
            if ($row['statuss'] == 'Đã xác nhận') {
                echo '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
            <td>
                <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row["id_hoadon"] . ', `Đang giao`, this)">Đang giao</a>
                <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)">X</a>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
            </td>
        </tr>';
            }

            if ($row['statuss'] == 'Đã giao') {
                echo '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
            <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
            </td>
        </tr>';
            }

            if ($row['statuss'] == 'Chờ xác nhận') {
                echo '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
            <td>
                <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã xác nhận`, this)">Xác nhận</a>
                <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)">X</a>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
            </td>
        </tr>';
            }
            if ($row['statuss'] == 'Đang giao') {
                echo '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
            <td>
                <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã giao`, this)">Đã giao</a>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
            </td>
        </tr>';
            }

            if ($row['statuss'] == 'Đã hủy') {
                echo '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
            <td>
                <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
            </td>
        </tr>';
            }
        }
    } else echo 'Không tìm thấy đơn hàng';
}

if (isset($_POST['status'])) {
    $val = $_POST['value'];
    if ($val == 'Tổng đơn') {
        $sql = "SELECT * FROM `hoadon` ORDER BY `hoadon`.`statuss`  ASC";
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
        <td>' . number_format($row['total_money']) . '</td>';

        if ($row['statuss'] == 'Đã xác nhận') {
            echo '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
        <td>
            <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row["id_hoadon"] . ', `Đang giao`, this)">Đang giao</a>
            <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)">X</a>
            <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
        </td>
    </tr>';
        }

        if ($row['statuss'] == 'Đã giao') {
            echo '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
        <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
        </td>
    </tr>';
        }

        if ($row['statuss'] == 'Chờ xác nhận') {
            echo '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
        <td>
            <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã xác nhận`, this)">Xác nhận</a>
            <a class="btn btn-danger btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)">X</a>
            <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
        </td>
    </tr>';
        }
        if ($row['statuss'] == 'Đang giao') {
            echo '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
        <td>
            <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã giao`, this)">Đã giao</a>
            <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
        </td>
    </tr>';
        }

        if ($row['statuss'] == 'Đã hủy') {
            echo '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
        <td>
            <a class="btn btn-outline-primary btn-sm" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '">!</a>
        </td>
    </tr>';
        }
    }
}

if (isset($_POST['thaotacdon'])) {
    $act = $_POST['act'];
    $id = $_POST['id'];
    $sql = "UPDATE hoadon SET statuss='{$act}' WHERE id_hoadon='$id'";
    //$result = execute($sql);
    echo $sql;
    die();
}
