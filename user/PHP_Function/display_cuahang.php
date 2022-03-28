<?php

require_once("../../query.php");

//hiện sản phẩm ở cửa hàng
if (isset($_POST["action"])) {
    // khai bao bien
    $result = $result1 = $temp = '';
    $arr = array('arr1' => '', 'pagin' => '');
    if ($_POST["action"] == 'displaycuahang') {

        $sql = "SELECT * FROM sanpham LIMIT 0,12";

        $temp = "SELECT * FROM sanpham";

    } else if ($_POST["action"] == "search") {

        $checkbox = explode(",", $_POST["checkbox"]);

        $i = 0;

        $sql = "SELECT * FROM sanpham where (";
        foreach ($checkbox as $c) {
            $i++;
            $sql .= "category like '%$c%'";
            if ($i < count($checkbox)) {
                $sql .= " or ";
            }
        }
        $pricefrom =$_POST['pricefrom'] !='' ? $_POST['pricefrom']:0;
        $priceto =$_POST['priceto'] !='' ? $_POST['priceto']: PHP_INT_MAX;

        $sql.= ") AND (price BETWEEN {$pricefrom} and {$priceto}) and material like '%{$_POST['material']}%' and madeby like '%{$_POST['madeby']}%'";

        $temp = $sql;
        $page = isset($_POST['page']) ? $_POST['page'] : 1;

        $start = ($page - 1) * 12;

        $sql .= " LIMIT $start, 12";

    }
    $result = executeResult($sql);
    $result1 = countRow($temp);
    //die($sql);
    foreach ($result as $sp) {
        $arr['arr1'] .= '<div class="card p-0">
        <div class="card-item h-100" style="text-align: center;">
            <a href="./user/PHP_Function/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title">' . $sp['name'] . '</h5>
                <p class="card-text">' . number_format($sp['price']) . '</p>
                <a class="btn btn-sm btn-outline-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Mua</a>
            </div>
        </div>
        </div>';
    }

    for ($i = 0; $i < ceil(($result1) / 12); $i++) {
        $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-secondary" onclick="timkiem(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
    }
    //echo $sql;
    echo json_encode($arr);
}
