<?php
include('../../query.php');
session_start();

// if (isset($_POST['id'])) {
//     $id = $_SESSION['iduser'];
//     $sql = "SELECT * FROM taikhoan WHERE id=$id";
//     $result = executeSingleResult($sql);
//     echo ' <h3>Thông tin cá nhân</h3>
//        <div class="form-floating mb-3">
//            <input type="email" class="form-control" id="hotencanhan" value="' . $result['fullname'] . '" placeholder="name@example.com">
//            <label for="floatingInput">Họ và tên</label>
//        </div>
//        <div class="form-floating mb-3">
//            <input type="text" class="form-control" id="sdtcanhan" value="' . $result['phone'] . '" placeholder="name@example.com">
//            <label for="floatingInput">Số điện thoại</label>
//        </div>
//        <div class="form-floating mb-3">
//            <input type="email" class="form-control" id="emailcanhan" value="' . $result['email'] . '" placeholder="name@example.com">
//            <label for="floatingInput">Email</label>
//        </div>
//        <div class="form-floating mb-3">
//            <input type="text" class="form-control" id="diachicanhan" value="' . $result['address'] . '"placeholder="name@example.com">
//            <label for="floatingInput">Địa chỉ mặc định</label>
//        </div>
//        <div class="form-floating mb-3">
//            <button type="button" class="btn btn-success" onclick="updateInfo(' . $_SESSION['iduser'] . ')">Cập nhật</button>
//        </div>';
// }

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'diachi') {
        $s = '';
        $sql = "SELECT * FROM diachikhach";
        $result = executeResult($sql);
        foreach ($result as $arr) {
            $s .= '<div class="item mt-3" style="border: 1px ridge">
                <div class="d-flex justify-content-between p-2">
                    <div class="info">
                        <div class="name">' . $arr['name'] . '</div>
                        <div class="address"><span>Địa chỉ: </span>' . $arr['addr'] . '</div>
                        <div class="phone"><span>Điện thoại: </span>' . $arr['phone'] . '</div>
                    </div>
                    <div><a class="text-primary text-decoration-none fs-6" href="">Chỉnh sửa</a>
                        <a class="btn btn-light text-danger btn-sm fs-6" href="">Xóa</a>
                    </div>
                </div>
            </div>';
        }
        echo $s;
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'order') {
        $s = '';
        $sql = "SELECT * FROM hoadon";
        $result = executeResult($sql);
        foreach ($result as $row) {
            $s .= '<tr>
                <th class="align-middle">
                    <p class="mb-0">' . $row['id_hoadon'] . '</p>
                </th>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . $row['ngaymua'] . '</p>
                </td>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_product']) . '</p>
                </td>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_money']) . '</p>
                </td>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p>
                </td>
                <td class="align-middle">
                    <a class="mb-0 btn btn-primary" href="./chitietdonhang_user.php?id='.$row['id_hoadon'].'">Chi tiết</a>
                </td>
            </tr>';
        }
        echo $s;
    }
}
