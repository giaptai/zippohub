<?php
include('../../query.php');

session_start();

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $addr=$_POST['addr'];
    $sql="UPDATE taikhoan SET fullname='$name', email='$email',
    phone='$phone', address='$addr' WHERE id=$id";
    $result=execute($sql);
    if($result){
        echo 'Cập nhật thành công';
    }else echo 'Lỗi';
}
?>