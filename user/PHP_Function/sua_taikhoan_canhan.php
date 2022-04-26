<?php
include('../../query.php');

session_start();

if(isset($_POST['canhan'])){
    $id=$_SESSION['iduser'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $addr=$_POST['addr'];

    if (!preg_match('/^[0-9]{10,11}$/', $phone)) {
        echo 'Số điện thoại lỗi';
        die();
    }

    if (!preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email)) {
        echo 'Email không hợp lệ';
        die();
    }

    $sql="UPDATE taikhoan SET fullname='$name', email='$email',
    phone='$phone', address='$addr' WHERE id=$id";
    $result=execute($sql);
    if($result){
        echo 'Cập nhật thông tin cá nhân thành công';
    }else echo 'Lỗi';
}

if(isset($_POST['update_diachi'])){
    $id_adr=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $addr=$_POST['addr'];
    
    if (!preg_match('/^[0-9]{10,11}$/', $phone)) {
        echo 'Số điện thoại lỗi';
        die();
    }

    $sql="UPDATE diachikhach SET `name`='$name', `phone`='{$phone}',
    addr='$addr' WHERE id_user={$_SESSION['iduser']} AND id_addr={$id_adr}";
    //die($sql);
    $result=execute($sql);
    if($result){
        echo 'Cập nhật địa chỉ thành công';
    }else echo 'Lỗi';
}
?>