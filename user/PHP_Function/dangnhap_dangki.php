<?php session_start();

include('../../query.php');

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM taikhoan WHERE email='$email' AND password='$pass' AND `status`=1";
    if (countRow($sql) > 0) {
        $result = execute($sql);
        $_SESSION['email'] = $email;
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['iduser'] = $row['id'];
        }
        echo 'success';
    } else echo 'fail';
}

if (isset($_POST['dangky'])) {
    $id = rand(1, 99999);
    $id_adr = rand(1000, 9999);
    $hovaten = $_POST['hovaten'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $diachi = $_POST['diachi'];

    if (empty($hovaten)) {
        echo 'Họ và tên trống';
        die();
    }

    if (empty($diachi)) {
        echo 'Địa chỉ trống';
        die();
    }

    if (!preg_match('/^[0-9]{10,11}$/', $sodienthoai)) {
        echo 'Số điện thoại không hợp lệ hoặc trống';
        die();
    }

    if (!preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)) {
        echo 'Email không hợp lệ';
        die();
    }

    if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $matkhau)) {
        echo 'Mật khẩu không hợp lệ';
        die();
    }

    $sql = "INSERT INTO taikhoan(id, fullname, email, `password`, `phone`, `address`, `status`) 
        VALUES ('$id','$hovaten','$email','$matkhau','$sodienthoai','$diachi',1)";

    $sql1 = "INSERT INTO diachikhach(id_user, id_addr, `name`, `phone`, addr, loai) 
        VALUES ('$id','$id_adr','$hovaten','$sodienthoai','$diachi', 1)";
    $result = execute($sql);
    if ($result) {
        echo 'success';
        execute($sql1);
    } else echo 'fail';
}

if (isset($_POST['logout'])) {
    unset($_SESSION['email']);
    unset($_SESSION['iduser']);
    unset($_SESSION['cart']);
}
