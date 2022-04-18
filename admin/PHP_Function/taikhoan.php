<?php
require_once("../../query.php");

//Lay het tai khoan
//Code xử lý, lay dữ liệu tu database
if (isset($_POST["search_phantrang"])) {
    $arr = array('arr1' => '', 'arr2' => '', 'arr3' => 0);
    $result = $result1 = $sql = '';
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $start = ($page - 1) * 5;
    $sql  = "SELECT * FROM taikhoan ";
    if (!empty($email) && !empty($phone) && !empty($address)) {
        $sql  .= "WHERE email LIKE '%$email%' and phone like '%$phone%' and `address` like '%$address%'";
    }
    if (!empty($email) && empty($phone) && empty($address)) {
        $sql  .= "WHERE email LIKE '%$email%' ";
    }
    if (!empty($email) && !empty($phone) && empty($address)) {
        $sql  .= "WHERE email LIKE '%$email%' and phone like '%$phone%'";
    }
    if (!empty($email) && empty($phone) && !empty($address)) {
        $sql  .= "WHERE email LIKE '%$email%' and `address` like '%$address%'";
    }
    if (empty($email) && !empty($phone) && empty($address)) {
        $sql  .= "WHERE phone like '%$phone%' ";
    }
    if (empty($email) && !empty($phone) && !empty($address)) {
        $sql  .= "WHERE phone like '%$phone%' and `address` like '%$address%'";
    }
    if (empty($email) && empty($phone) && !empty($address)) {
        $sql  .= "WHERE `address` like '%$address%' ";
    }
    $temp = $sql;
    $sql .= "limit {$start},5";
    // die($sql);
    $result = executeResult($sql);
    $result1 = countRow($temp);

    foreach ($result as $tk) {
        $arr['arr1'] .= '<tr>
        <th scope="row"><label>' . ++$start . '</label></th>
                <td>' . $tk['fullname'] . '</td>
                <td>' . $tk['email'] . '</td>
                <td>' . $tk['phone'] . '</td>
                <td>' . $tk['address'] . '</td>
            <td>
                <button class="btn btn-outline-warning btn-sm">Khóa</button>
                <button onclick="details(' . $tk['id'] . ')" type="button" class="btn btn-outline-info btn-sm" id="detail' . $tk['id'] . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Chi tiết
        </button>
                </td>
            </tr>';
    }
    for ($i = 0; $i < ceil(($result1) / 5); $i++) {
        $arr['arr2'] .= '<button type="button" class="btn btn-outline-secondary" onclick="search(' . $i + 1 . ')">' . $i + 1 . '</button>';
    }
    $arr['arr3'] = $result1;
    echo json_encode($arr);
}

if (isset($_POST["details"])) {
    // if ($_POST["action"] == 'details') {
    $id = $_POST["id"];
    $s = '';
    $sql = "SELECT * FROM taikhoan where id=$id";
    $result = executeSingleResult($sql);
    $s = '
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="form-floating" enctype="multipart/form-data" method="POST">
    
                <div class="form-floating mb-4">
                    <input type="text" id="namee" class="form-control" placeholder="1" name="namee" value="' . $result['fullname'] . '">
                    <label class="form-label" for="floatingInput">Họ và tên</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="email" id="emaill" class="form-control" placeholder="1" name="emaill" value="' .  $result['email'] . '">
                    <label class="form-label" for="form5Example2">Email</label>
                </div>
    
                <div class="form-floating mb-4">
                    <input type="password" id="passwordd" class="form-control" placeholder="1" name="passwordd" value="' . $result['password'] . '">
                    <label class="form-label" for="form5Example2">Mật khẩu</label>
                </div>
        
                <div class="form-floating mb-4">
                    <input type="tel" id="phonee" class="form-control" placeholder="1" name="phonee" value="' . $result['phone'] . '">
                    <label class="form-label" for="form5Example2">Số điện thoại</label>
                </div>
        
                <div class="form-floating mb-4">
                    <textarea class="form-control" id="addresss" rows="10" placeholder="1" name="addresss">' . $result['address'] . '</textarea>
                    <label class="form-label" for="floatingInput">Địa chỉ</label>
                </div>
            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateCus(' . $result['id'] . ')">Cập nhật</button>
                </div>';
    echo $s;
}
// }

if (isset($_POST["update"])) {
    // if ($_POST["action"] == 'update') {
    if (isset($_POST['id'])) {
        $idd = $_POST['id'];
    }
    if (isset($_POST['namee'])) {
        $ten = $_POST['namee'];
    }
    if (isset($_POST['emaill'])) {
        $email = $_POST['emaill'];
    }
    if (isset($_POST['passwordd'])) {
        $matkhau = $_POST['passwordd'];
    }
    if (isset($_POST['phonee'])) {
        $dienthoai = $_POST['phonee'];
    }
    if (isset($_POST['addresss'])) {
        $diachi = $_POST['addresss'];
    }
    $sql  = "UPDATE taikhoan SET fullname='$ten', email='$email',
        `password`='$matkhau', phone='$dienthoai',address='$diachi' WHERE id=$idd";
    if (execute($sql)) {
        echo 'success';
    } else echo 'fail';
}

if (isset($_POST["add"])) {
    if ($_POST["add"] == 'them') {
        $idd = rand(10000, 99999);
        if (isset($_POST['namee'])) {
            $ten = $_POST['namee'];
        }
        if (isset($_POST['emaill'])) {
            $email = $_POST['emaill'];
        }
        if (isset($_POST['passwordd'])) {
            $matkhau = $_POST['passwordd'];
        }
        if (isset($_POST['phonee'])) {
            $dienthoai = $_POST['phonee'];
        }
        if (isset($_POST['addresss'])) {
            $diachi = $_POST['addresss'];
        }
        $sql  = "INSERT INTO taikhoan(id, fullname, email, `password`, phone, `address`, `status`) 
        VALUES ('$idd', '$ten', '$email', '$matkhau', '$dienthoai', '$diachi', 1)";
        if (execute($sql)) {
            echo 'success';
        } else echo 'fail';
        die();
    }
}
?>
