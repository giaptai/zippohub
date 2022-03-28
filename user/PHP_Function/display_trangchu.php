<?php

require_once("../../query.php");

//Hien danh sach san pham dang table

//hiện tất cả sản phẩm ở trang chủ
//Code xử lý, lay dữ liệu tu database
if (isset($_POST["action"])) {
    if ($_POST["action"] == 'displaysanpham') {
        $arr=array('arr0'=>'', 'arr1'=>'', 'arr2'=>'', 'arr3'=>'');

        $sql0 = "SELECT * FROM sanpham LIMIT 0,12";
        $sql1 = "SELECT * FROM sanpham where category='Zippo Armor' LIMIT 0,5";
        $sql2 = "SELECT * FROM sanpham where category='Zippo Sterling Silver' LIMIT 0,5";
        $sql3 = "SELECT * FROM sanpham where category='Zippo Base Models' LIMIT 0,5";

        $result0 = executeResult($sql0);
        $result00=countRow("SELECT * FROM sanpham");

        $result1 = executeResult($sql1);
        $result2 = executeResult($sql2);
        $result3 = executeResult($sql3);

           //in san pham
        foreach($result0 as $sp0){
            $arr['arr0'].='<div class="card p-0">
            <div class="card-item h-100" style="text-align: center;">
                <a href="./user/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp0['img'] . '" class="card-img-top" alt="..."></a>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">' . $sp0['name'] . '</h5>
                    <p class="card-text">' . number_format( $sp0['price']) . '</p>
                    <a class="btn btn-sm btn-primary" id="id' . $sp0['id'] . '" onclick="buyproduct(' . $sp0['id'] . ')">Mua</a>
                </div>
            </div>
            </div>';
        }

        foreach($result1 as $sp1){
            $arr['arr1'].='<div class="card p-0">
            <div class="card-item h-100" style="text-align: center;">
                <a href="./user/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp1['img'] . '" class="card-img-top" alt="..."></a>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">' . $sp1['name'] . '</h5>
                    <p class="card-text">' . number_format( $sp1['price']) . '</p>
                    <a class="btn btn-sm btn-primary" id="id' . $sp1['id'] . '" onclick="buyproduct(' . $sp1['id'] . ')">Mua</a>
                </div>
            </div>
            </div>';
        }

        foreach($result2 as $sp2){
            $arr['arr2'].='<div class="card p-0">
            <div class="card-item h-100" style="text-align: center;">
                <a href="./user/PHP_Function/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp2['img'] . '" class="card-img-top" alt="..."></a>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">' . $sp2['name'] . '</h5>
                    <p class="card-text">' . number_format( $sp2['price']) . '</p>
                    <a class="btn btn-sm btn-primary" id="id' . $sp2['id'] . '" onclick="buyproduct(' . $sp2['id'] . ')">Mua</a>
                </div>
            </div>
            </div>';
        }

        foreach($result3 as $sp3){
            $arr['arr3'].='<div class="card p-0">
            <div class="card-item h-100" style="text-align: center;">
                <a href="./user/PHP_Function/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp3['img'] . '" class="card-img-top" alt="..."></a>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">' . $sp3['name'] . '</h5>
                    <p class="card-text">' . number_format( $sp3['price']) . '</p>
                    <a class="btn btn-sm btn-primary" id="id' . $sp3['id'] . '" onclick="buyproduct(' . $sp3['id'] . ')">Mua</a>
                </div>
            </div>
            </div>';
        }
        echo json_encode($arr);
    }
}

//phan trang
if (isset($_GET["page"])) {
    $count = $_GET["page"];
    $start = ($count - 1) * 12;
    $sql = "SELECT * FROM sanpham LIMIT $start, 12";
    $result = executeResult($sql);
    foreach($result as $sp){
        echo '<div class="card p-0">
        <div class="card-item h-100" style="text-align: center;">
            <a href="./user/PHP_Function/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title">' . $sp['name'] . '</h5>
                <p class="card-text">' . number_format( $sp['price']) . '</p>
                <a class="btn btn-sm btn-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Mua</a>
            </div>
        </div>
        </div>';
    }
}

if (isset($_GET["action"])) {
    if($_GET["action"]=='search'){
        $arr=explode(',', $_GET["list"]);

        $material=($_GET["material"] !='')?$_GET["material"]:'';
        $madeby=($_GET["madeby"] !='') ? $_GET["madeby"]:'';
        $pricefrom=($_GET["pricefrom"] !=0) ? $_GET["pricefrom"]:0;
        $priceto=($_GET["priceto"] !=0) ? $_GET["priceto"] : 0;

        $sql = "SELECT * FROM sanpham WHERE";
        $i=0;
        foreach($arr as $a){
            $i++;
            $sql.=" trademark LIKE '%$a%' ";
            if($i<count($arr)){
                $sql.= " OR";
            }
        }
        $count = $_GET["page"];
        $start = ($count - 1) * 4;
        $sql .= "and material like '%$material%' and madeby LIKE '%$madeby%' AND price BETWEEN $pricefrom and $priceto LIMIT $start, 4";
        echo ($sql) ;
        $result=executeResult($sql);

        foreach($result as $sp){
            echo '<div class="card p-0">
            <div class="card-item h-100" style="text-align: center;">
                <a href="./user/PHP_Function/hien_chitiet_sanpham_grid.php"><img style="width:8rem; height:9rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">' . $sp['name'] . '</h5>
                    <p class="card-text">' . number_format( $sp['price']) . '</p>
                    <a class="btn btn-sm btn-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Mua</a>
                </div>
            </div>
            </div>';
        }
    }
    
}
?>
