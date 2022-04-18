<?php
include('../../query.php');

if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $dem = "SELECT * FROM diachikhach where id_user={$id_user}";
    if (countRow($dem) < 5) {
        $id_addr = $_POST['id_addr'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
        $sql = "INSERT INTO diachikhach(id_user, id_addr, `name`, phone, addr) 
        VALUES ('$id_user','$id_addr','$name','$phone','$addr')";
        $result = execute($sql);
        if ($result) {
            echo 'Thêm địa chỉ thành công';
        } else echo 'fail';
    }else echo 'fail1';
}
