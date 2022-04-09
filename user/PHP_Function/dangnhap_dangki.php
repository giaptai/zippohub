<?php session_start();

include('../../query.php');

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM taikhoan WHERE email='$email' AND password='$pass'";
    if (countRow($sql) > 0) {
        $result = execute($sql);
        $_SESSION['email'] = $email;
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['iduser'] = $row['id'];
        }
        echo 'success';
    } else echo 'fail';
}

if (isset($_POST['action'])) {
    $id = rand(1, 99999);
    $hovaten = $_POST['hovaten'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $diachi = $_POST['diachi'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'ko hop le';
        die();
    } else {
        echo 'ok';
        die();
    }
    $sql = "INSERT INTO taikhoan(id, fullname, email, `password`, `phone`, `address`, `status`) 
        VALUES ('$id','$hovaten','$email','$matkhau','$sodienthoai','$diachi',1)";
    $result = execute($sql);
    if ($result) {
        echo 'success';
    } else echo 'fail';
}

if (isset($_POST['logout'])) {
    unset($_SESSION['email']);
    unset($_SESSION['iduser']);
    unset($_SESSION['cart']);
}
