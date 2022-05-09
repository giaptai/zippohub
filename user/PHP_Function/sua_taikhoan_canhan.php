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

    $checkk=executeResult("SELECT * FROM diachikhach WHERE id_user=$id");

    foreach($checkk as $row){
        if($row['loai']==1){
            execute("UPDATE diachikhach SET `name`='$name', `phone`='{$phone}',
             addr='$addr' WHERE id_user={$_SESSION['iduser']} AND loai=1");
            break;
        }
    }
   
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
    $checkk=executeSingleResult("SELECT * FROM diachikhach WHERE id_addr=$id_adr");
    if($checkk['loai']==1){
        $id=$_SESSION['iduser'];
        execute("UPDATE taikhoan SET fullname='$name', phone='$phone', `address`='$addr' WHERE id=$id");
    }
    $sql="UPDATE diachikhach SET `name`='$name', `phone`='{$phone}',
    addr='$addr' WHERE id_user={$_SESSION['iduser']} AND id_addr={$id_adr}";
    //die($sql);
    $result=execute($sql);
    if($result>0){
        echo 'Cập nhật địa chỉ thành công';
    }else echo 'Lỗi';
}

// Thay đổi địa chỉ mặc đinh
if(isset($_POST['choose_diachi'])){
    $id_adr=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $addr=$_POST['addr'];

    execute("UPDATE diachikhach SET loai=0 WHERE 1");
    $result=execute("UPDATE diachikhach SET loai=1 WHERE id_addr=$id_adr");

    $checkk=executeSingleResult("SELECT * FROM diachikhach WHERE id_addr=$id_adr");
    if($checkk['loai']==1){
        $id=$_SESSION['iduser'];
        execute("UPDATE taikhoan SET fullname='$name', phone='$phone', `address`='$addr' WHERE id=$id");
    }
    if($result>0){
        echo 'Cập nhật địa chỉ mặc định thành công';
    }else echo 'Lỗi';
}
?>