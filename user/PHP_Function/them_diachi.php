<?php
include('../../query.php');

if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $dem = "SELECT * FROM diachikhach where id_user={$id_user}";
    if (countRow($dem) < 5) {
        $id_addr = rand(100, 9999);
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
        $sql = "INSERT INTO diachikhach(id_user, id_addr, `name`, phone, addr) 
        VALUES ('$id_user','$id_addr','$name','$phone','$addr')";
        $result = execute($sql);
        if ($result) {
            echo 'Thêm địa chỉ thành công';
        } else echo 'Lỗi';
    }else echo 'Mỗi tài khoản chỉ được tối đa 5 địa chỉ';
}
