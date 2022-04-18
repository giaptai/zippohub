<?php
require_once('../../query.php');

// lay danh sach don hang
if (isset($_POST['displaydonhang'])) {
    $arr = array('tongdon' => 0, 'choxacnhan' => 0, 'daxacnhan' => 0, 'danggiao' => 0, 'dagiao' => 0, 'dahuy' => 0);
    $arr['tongdon'] = countRow("SELECT * FROM `hoadon`");
    $arr['choxacnhan'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Chờ xác nhận'");
    $arr['daxacnhan'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã xác nhận'");
    $arr['danggiao'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đang giao'");
    $arr['dagiao'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã giao'");
    $arr['dahuy'] = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã hủy'");
    echo json_encode($arr);
}

if (isset($_POST['timkiemma'])) {
    $val = $_POST['value'];
    if (empty($val)) {
        $sql = "SELECT * FROM hoadon ORDER BY `hoadon`.`statuss`  ASC LIMIT 0, 10";
    } else $sql = "SELECT * FROM hoadon WHERE id_hoadon={$val}";
    $i=0;
    // echo $val, $sql;
    // die();
    if (countRow($sql) > 0) {
        $result = executeResult($sql);
        foreach ($result as $row) {
            echo '<tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <span>'.++$i.'</span>
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

if (isset($_POST['trangthai'])) {
    $val = $_POST['value'];
    if ($val == 'Tổng đơn') {
        $sql = "SELECT * FROM `hoadon` ORDER BY `hoadon`.`statuss` ASC LIMIT 0, 10";
    } else $sql = "SELECT * FROM `hoadon` WHERE `statuss`='{$val}' LIMIT 0, 10";
    $result = executeResult($sql);
    $i = 1;
    foreach ($result as $row) {
        echo ' <tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <span>' . $i++ . '</span>
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

if (isset($_POST['phantrang'])) {
    $page = $_POST['page'];
    $start = ($page - 1) * 10;
    $val = $_POST['val'];
    $sql='';
    if($val=='Tổng đơn'){
        $result = executeResult("SELECT * FROM hoadon ORDER BY `hoadon`.`statuss` ASC LIMIT $start, 10");
    }else $result = executeResult("SELECT * FROM hoadon WHERE statuss='{$val}' LIMIT $start, 10");
    foreach ($result as $row) {
        echo ' <tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <span>' . ++$start. '</span>
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
