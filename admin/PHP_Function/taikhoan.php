<?php
require_once("../../query.php");

chucnang();
function chucnang()
{
    $action = $_POST['action'];
    $sql  = "SELECT * FROM taikhoan ";
    switch ($action) {
        case 'search':
            display($sql, 1);
            break;
        case 'phantrang':
            display($sql, 1);
            break;
        case 'details':
            $id = $_POST["id"];
            $sql .= "where id=$id";
            details($sql, 1);
            break;
        case 'update':
            $status = $_POST["status"];
            $id  = $_POST["id"];
            updateCus($status, $id);
            break;
    }
}

function display($query, $start)
{
    $arr = array('arr1' => '', 'arr2' => '', 'arr3' => 0);
    $result = $result1 = $temp = '';
    $seach = '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $start = ($page - 1) * 10;
    if ($_POST["action"] == 'search' || $_POST["id"] == 'search') {
        if (!empty($email) && (!empty($phone) || $phone == 0) && !empty($address)) {
            $query  .= "WHERE email LIKE '%$email%' and phone like '%$phone%' and `address` like '%$address%'";
        } else if (!empty($email) && empty($phone) && empty($address)) {
            $query  .= "WHERE email LIKE '%$email%' ";
        } else if (!empty($email) && (!empty($phone) || $phone == 0) && empty($address)) {
            $query  .= "WHERE email LIKE '%$email%' and phone like '%$phone%'";
        } else if (!empty($email) && empty($phone) && !empty($address)) {
            $query  .= "WHERE email LIKE '%$email%' and `address` like '%$address%'";
        } else if (empty($email) && (!empty($phone) || $phone == 0) && empty($address)) {
            $query  .= "WHERE phone like '%$phone%' ";
        } else if (empty($email) && (!empty($phone) || $phone == 0) && !empty($address)) {
            $query  .= "WHERE phone like '%$phone%' and `address` like '%$address%'";
        } else if (empty($email) && empty($phone) && !empty($address)) {
            $query  .= "WHERE `address` like '%$address%'";
        }
        $seach = ",'search'";
    }
    $temp .= $query;
    $query .= " limit {$start},10";
    //die($query);
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $tk) {
            $arr['arr1'] .= '<tr>
        <th scope="row"><label>' . ++$start . '</label></th>
                <td>' . $tk['fullname'] . '</td>
                <td>' . $tk['email'] . '</td>
                <td>' . $tk['phone'] . '</td>
                <td>' . $tk['address'] . '</td>
                <td>' . (($tk['status'] == 1) ?  "Mở" : "Khóa")  . '</td>
            <td>
                <button class="btn btn-outline-warning btn-sm">Khóa</button>
                <button onclick="details(' . $tk['id'] . ')" type="button" class="btn btn-outline-info btn-sm" id="detail' . $tk['id'] . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Chi tiết
        </button>
                </td>
            </tr>';
        }
        for ($i = 0; $i < ceil(($result1) / 10); $i++) {
            if ($i == $page - 1) {
                $arr['arr2'] .= '<button type="button" class="btn btn-outline-primary active" onclick="phantrang(' . $i + 1 . '' . $seach . ')">' . $i + 1 . '</button>';
            } else $arr['arr2'] .= '<button type="button" class="btn btn-outline-primary" onclick="phantrang(' . $i + 1 . '' . $seach . ')">' . $i + 1 . '</button>';
        }
        $arr['arr3'] = $result1;
    } else {
        $arr['arr1'] = '<td colspan="7">Không tìm thấy</td>';
    }
    echo json_encode($arr);
}
// <div class="form-floating mb-4">
// <input type="password" id="passwordd" class="form-control" placeholder="1" name="passwordd" value="' . $result['password'] . '">
// <label class="form-label" for="form5Example2">Mật khẩu</label>
// </div>
function details($query)
{
    $id = $_POST["id"];
    $s = '';
    $result = executeSingleResult($query);
    $s = '
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="form-floating" enctype="multipart/form-data" method="POST">
    
                <div class="form-floating mb-4">
                    <input disabled type="text" id="namee" class="form-control" placeholder="1" name="namee" value="' . $result['fullname'] . '">
                    <label class="form-label" for="floatingInput">Họ và tên</label>
                </div>
                <div class="form-floating mb-4">
                    <input disabled type="email" id="emaill" class="form-control" placeholder="1" name="emaill" value="' .  $result['email'] . '">
                    <label class="form-label" for="form5Example2">Email</label>
                </div>
        
                <div class="form-floating mb-4">
                    <input disabled type="tel" id="phonee" class="form-control" placeholder="1" name="phonee" value="' . $result['phone'] . '">
                    <label class="form-label" for="form5Example2">Số điện thoại</label>
                </div>
        
                <div class="form-floating mb-4">
                    <textarea disabled class="form-control" id="addresss" rows="10" placeholder="1" name="addresss">' . $result['address'] . '</textarea>
                    <label class="form-label" for="floatingInput">Địa chỉ</label>
                </div>

                <div class="form-floating mb-4">
                    <select class="form-select" id="trangthai">
                        <option value="1" ' . (($result['status'] == 1) ?  "selected" : "") . '>Mở</option>
                        <option value="0" ' . (($result['status'] == 0) ?  "selected" : "") . '>Khóa</option>
                    </select>
                    <label class="form-label" for="floatingInput">Trạng thái</label>
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

function updateCus($status, $id)
{
    $sql  = "UPDATE taikhoan SET `status`='$status' WHERE id=$id";
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

// if (isset($_POST["sendmail"])) {
    // ini_set('SMTP', 'smtp.gmail.com');
    // ini_set('smtp_port', '587');
    // ini_set('sendmail_from', "hentaiktvn321@gmail.com");

    // $to_email = 'gtainguyenk19@gmail.com';
    // $subject = 'Testing PHP Mail';
    // $message = 'This mail is sent using the PHP mail function';
    // $header = "From: hentaiktvn321@gmail.com";

    // mail($to_email, $subject, $message, $header);
//     if ($sss) {
//         echo 'thanh cong';
//     } else 'that bai';
// }
