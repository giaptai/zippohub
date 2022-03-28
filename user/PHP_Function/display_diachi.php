<?php
include('../../query.php');
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'diachi') {
        $s = '';
        $sql = "SELECT * FROM diachikhach";
        $result = executeResult($sql);
        foreach ($result as $arr) {
            $s .= '<div class="item mt-3" style="border: 1px ridge">
                <div class="d-flex justify-content-between p-2">
                    <div class="info">
                        <div class="name">' . $arr['name'] . '</div>
                        <div class="address"><span>Địa chỉ: </span>' . $arr['addr'] . '</div>
                        <div class="phone"><span>Điện thoại: </span>' . $arr['phone'] . '</div>
                    </div>
                    <div>
                        <a class="text-primary text-decoration-none fs-6" >Chỉnh sửa</a>
                        <a class="btn btn-light text-danger btn-sm fs-6" onclick="xoaDiaChi()">Xóa</a>
                    </div>
                </div>
            </div>';
        }
        echo $s;
    }
}
?>