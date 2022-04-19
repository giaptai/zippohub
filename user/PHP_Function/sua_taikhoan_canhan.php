<?php
include('../../query.php');

session_start();

if(isset($_POST['canhan'])){
    //$id=$_POST['id'];
    $id=$_SESSION['iduser'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $addr=$_POST['addr'];
    $sql="UPDATE taikhoan SET fullname='$name', email='$email',
    phone='$phone', address='$addr' WHERE id=$id";
    $result=execute($sql);
    if($result){
        echo 'Cập nhật thông tin cá nhân thành công';
    }else echo 'Lỗi';
}

if(isset($_POST['update_diachi'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $addr=$_POST['addr'];
    $sql="UPDATE diachikhach SET `name`='{$name}', `phone`='{$phone}',
    addr='{$addr}' WHERE id_user='{$_SESSION['iduser']}' AND id_addr='{$addr}'";
    $result=execute($sql);
    if($result){
        echo 'Cập nhật địa chỉ thành công';
    }else echo 'Lỗi';
}
?>