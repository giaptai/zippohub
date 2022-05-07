<?php require_once("../../query.php");
session_start();

chucnang();
function chucnang()
{
    $action = $_POST['action'];
    switch ($action) {
        case 'search';
            search();
            break;
        case 'timkiem';
            search();
            break;
        default:
            break;
    }
}

// code loi
// function searchName(){
//     $result = $result1 = $temp = '';
//     $start = 0;
//     $arr = array('arr1' => '', 'pagin' => '', 'url' => './cuahang.php?');
//     $page = isset($_POST['page']) ? $_POST['page'] : 1;
//     if (isset($_POST["key"])) {
//         $nameSP = $_POST["key"];
//         $sql = "SELECT * FROM sanpham WHERE name LIKE '%{$nameSP}%'";
//         $temp = $sql;
//         $arr['url'] .= 'key=' . $nameSP;
//     } 
//         $temp = $sql;
//         $start = ($page - 1) * 10;
//         $sql .= " LIMIT $start, 10";
//     }
//     $start = ($page - 1) * 10;
//     $sql .= " LIMIT $start, 10";
//     $arr['url'] .= '&page=' . $page;
//     //die($arr['url'] . '<br>' . $sql);
//     $result = executeResult($sql);
//     $result1 = countRow($temp);
//     if ($result1 > 0) {
//         foreach ($result as $sp) {
//             $arr['arr1'] .= '<div class="col">
//             <div class="card p-3 h-100" style="text-align: center;">
//                 <a href="./user/hien_chitiet_sanpham_grid.php?id=' . $sp['id'] . '"><img style="object-fit: cover; width:7rem; height:8rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
//                 <div class="card-body">
//                     <h6 class="card-title">' . $sp['name'] . '</h6>
//                     <p class="card-text">' . number_format($sp['price']) . ' VNĐ</p>
//                 </div>';
//             if (!isset($_SESSION["cart"][$sp['id']])) {
//                 $arr['arr1'] .= '<div ><a class="btn btn-sm btn-outline-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Thêm vào giỏ</a>';
//             } else {
//                 $arr['arr1'] .= '<div ><a class="btn btn-sm btn-primary disabled" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Đã thêm vào giỏ</a>';
//             }
//             $arr['arr1'] .= ' 
//                     </div>
//                 </div>
//             </div>';
//         }
//         for ($i = 0; $i < ceil(($result1) / 10); $i++) {
//             if ($i == $page - 1) {
//                 $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-primary btn-sm active" onclick="timkiem(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
//             } else  $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-primary btn-sm" onclick="timkiem(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
//         }
//     } else $arr['arr1'] = "Không tìm thấy sản phẩm !";
//     echo json_encode($arr);
// }

function search(){
    $result = $result1 = $temp = '';
    $start = 0;
    $arr = array('arr1' => '', 'pagin' => '', 'url' => './cuahang.php?');
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    if (isset($_POST["key"]) && $_POST["key"]!='undefined') {
        $nameSP = $_POST["key"];
        $sql = "SELECT * FROM sanpham WHERE name LIKE '%{$nameSP}%'";
        $temp = $sql;
        $arr['url'] .= 'key=' . $nameSP;
    } else if (isset($_SESSION["xemthem"])) {
        $sql = 'SELECT * FROM sanpham WHERE category = "' . $_SESSION["xemthem"] . '"';
        $temp = $sql;
        unset($_SESSION["xemthem"]);
    } else if ($_POST["action"] == "search") {
        $checkbox = explode(",", $_POST["checkbox"]);
        $i = 0;
        $sql = "SELECT * FROM sanpham where (";
        foreach ($checkbox as $c) {
            $i++;
            if ($c == 'All') {
                $sql .= "category like '%%'";
                $arr['url'] .= 'search' . $i . '=' . $c;
                break;
            } else {
                $sql .= "category like '%$c%'";
                if (!empty($c)) {
                    $arr['url'] .= 'search' . $i . '=' . $c;
                }
                if ($i < count($checkbox)) {
                    $sql .= " or ";
                    $arr['url'] .= '&';
                }
            }
        }
        $_POST['pricefrom'] != '' ? $pricefrom = $_POST['pricefrom'] and $arr['url'] .= '&pricefrom=' . $_POST['pricefrom'] : $pricefrom = 0;
        $_POST['priceto'] != '' ? $priceto = $_POST['priceto'] and $arr['url'] .= '&priceto=' . $_POST['priceto'] : $priceto = PHP_INT_MAX;
        $_POST['material'] != '' ? $material = $_POST['material'] : $material = '' and $arr['url'] .= '&material=' . $_POST['material'];
        $_POST['madeby'] != '' ? $madeby = $_POST['madeby'] : $madeby = '' and $arr['url'] .= '&madeby=' . $_POST['madeby'];
        $sql .= ") AND (price BETWEEN {$pricefrom} and {$priceto}) and material like '%{$material}%' and madeby like '%{$madeby}%'";
        $temp = $sql;
        // $start = ($page - 1) * 10;
        // $sql .= " LIMIT $start, 10";
    }
    $start = ($page - 1) * 10;
    $sql .= "ORDER BY `price` ASC LIMIT $start, 10";

    $arr['url'] .= '&page=' . $page;
    //die($arr['url'] . '<br>' . $sql);
    /*
        $arr['arr1'] .= '<div class="card p-0">
    <div class="card-item h-100" style="text-align: center;">
        <a href="./user/hien_chitiet_sanpham_grid.php?id=' . $sp['id'] . '"><img style="object-fit: cover; width:7rem; height:8rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
        <div class="card-body" style="text-align: center;">
            <h5 class="card-title">' . $sp['name'] . '</h5>
            <p class="card-text">' . number_format($sp['price']) . ' VNĐ</p>';
    if (!isset($_SESSION["cart"][$sp['id']])) {
        $arr['arr1'] .= '<a class="btn btn-sm btn-outline-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Thêm vào giỏ</a>';
    } else {
        $arr['arr1'] .= '<a class="btn btn-sm btn-primary disabled" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Đã thêm vào giỏ</a>';
    }
    $arr['arr1'] .= ' 
        </div>
    </div>
    </div>';
    */
    $result = executeResult($sql);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $sp) {
            $arr['arr1'] .= '<div class="col">
            <div class="card p-3 h-100" style="text-align: center;">
                <a href="./user/hien_chitiet_sanpham_grid.php?id=' . $sp['id'] . '"><img style="object-fit: cover; width:7rem; height:8rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h6 class="card-title">' . $sp['name'] . '</h6>
                    <p class="card-text">' . number_format($sp['price']) . ' VNĐ</p>
                </div>';
            if (!isset($_SESSION["cart"][$sp['id']])) {
                $arr['arr1'] .= '<div ><a class="btn btn-sm btn-outline-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Thêm vào giỏ</a>';
            } else {
                $arr['arr1'] .= '<div ><a class="btn btn-sm btn-primary disabled" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Đã thêm vào giỏ</a>';
            }
            $arr['arr1'] .= ' 
                    </div>
                </div>
            </div>';
        }
        for ($i = 0; $i < ceil(($result1) / 10); $i++) {
            if ($i == $page - 1) {
                $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-primary btn-sm active" onclick="timkiem('.($i + 1).', `'.(isset($_POST["key"]) ? $_POST["key"]:'xemketqua').'`)">' . ($i + 1) . '</a></li>';
            } else  $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-primary btn-sm" onclick="timkiem('.($i + 1).', `'.(isset($_POST["key"]) ? $_POST["key"]:'xemketqua').'`)">' . ($i + 1) . '</a></li>';
        }
    } else $arr['arr1'] = "Không tìm thấy sản phẩm !";
    echo json_encode($arr);
}

// if (isset($_POST["action"]) || isset($_SESSION["xemthem"])) {
//     $result = $result1 = $temp = '';
//     $arr = array('arr1' => '', 'pagin' => '');
//     $page = isset($_POST['page']) ? $_POST['page'] : 1;
//     if (isset($_SESSION["xemthem"])) {
//         $sql = 'SELECT * FROM sanpham WHERE category = "' . $_SESSION["xemthem"] . '"';
//         $temp = $sql;
//         unset($_SESSION["xemthem"]);
//     } else if ($_POST["action"] == "search") {
//         $checkbox = explode(",", $_POST["checkbox"]);
//         $i = 0;
//         $sql = "SELECT * FROM sanpham where (";
//         foreach ($checkbox as $c) {
//             $i++;
//             $sql .= "category like '%$c%'";
//             if ($i < count($checkbox)) {
//                 $sql .= " or ";
//             }
//         }
//         $pricefrom = $_POST['pricefrom'] != '' ? $_POST['pricefrom'] : 0;
//         $priceto = $_POST['priceto'] != '' ? $_POST['priceto'] : PHP_INT_MAX;
//         $sql .= ") AND (price BETWEEN {$pricefrom} and {$priceto}) and material like '%{$_POST['material']}%' and madeby like '%{$_POST['madeby']}%'";
//         $temp = $sql;
//         //$page = isset($_POST['page']) ? $_POST['page'] : 1;
//         $start = ($page - 1) * 12;
//         $sql .= " LIMIT $start, 12";
//     }
//     $result = executeResult($sql);
//     $result1 = countRow($temp);
//     if ($result1 > 0) {
//         foreach ($result as $sp) {
//             $arr['arr1'] .= '<div class="card p-0">
//         <div class="card-item h-100" style="text-align: center;">
//             <a href="./user/hien_chitiet_sanpham_grid.php?id=' . $sp['id'] . '"><img style="object-fit: cover; width:8rem; height:9rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
//             <div class="card-body" style="text-align: center;">
//                 <h5 class="card-title">' . $sp['name'] . '</h5>
//                 <p class="card-text">' . number_format($sp['price']) . ' VNĐ</p>';
//             if (!isset($_SESSION["cart"][$sp['id']])) {
//                 $arr['arr1'] .= '<a class="btn btn-sm btn-outline-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Thêm vào giỏ</a>';
//             } else {
//                 $arr['arr1'] .= '<a class="btn btn-sm btn-primary disabled" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Đã thêm vào giỏ</a>';
//             }
//             $arr['arr1'] .= ' 
//             </div>
//         </div>
//         </div>';
//         }
//         for ($i = 0; $i < ceil(($result1) / 12); $i++) {
//             if($i==$page-1){
//                 $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-secondary btn-sm active" onclick="timkiem(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
//             }else  $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-secondary btn-sm" onclick="timkiem(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
           
//         }
//     } else $arr['arr1'] = "Không tìm thấy sản phẩm !";
//     echo json_encode($arr);
// }
