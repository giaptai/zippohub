<?php
require_once("../../query.php");

chucnang();
function chucnang(){
    $action = $_POST['action'];
    $sql = "SELECT * FROM sanpham";
    switch ($action) {
        case 'search':
            $id = $_POST['id'];
            if (!empty($id) || $id == 0) {
                $sql .= " where id='$id'";
                display($sql);
            } else {
                display($sql);
            }
            break;

        case 'phantrang':
            display($sql);
            break;

        case 'detail':
            $id = $_POST['id'];
            detail($id);
            break;

        case 'edit':
            edit();
            break;

        case 'deleted':
            $id = $_POST['id'];
            deletedProduct($id);
            break;
            
        case 'deleted1page':
            $idd = explode(',', $_POST["data"]);
            deleted1Page($idd);
            break;

        case 'add':
            add();
            break;
        default:
            break;
    }
}

// hiện danh sách sản phẩm
function display($query){
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $start = ($page - 1) * 5;
    $arr = array('arr1' => '', 'pagin' => '', 'tong' => 0);
    $temp = $query;
    $query .= " LIMIT $start, 5";
    //die($query);
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $sp) {
            $arr['arr1'] .= '<tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $sp['id'] . '">
                    <span>' . (++$start) . ' #' . $sp['id'] . '</span>
                </div>
            </th>' .
                '<td>
                <img src="../picture/' . $sp["img"] . '"width="auto" height="80">
                <span>' . $sp['name'] . '</span>
            </td>' .
                '<td>' . $sp['amount'] . '</td>
            <td>' . number_format($sp['price'], 0, '.') . ' ₫</td>' .
                '<td>' . '<span>' . (($sp['state'] == 1) ?  "Còn hàng" : "Hết hàng") . '</span></td>' .
                '<td>
                <button type="button" class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" id="sua' . $sp['id'] . '" onclick="detail(' . $sp['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                <button class="btn btn-sm fa-regular fa-trash-can fs-4 text-danger" name="xoa" id="xoa' . $sp['id'] . '" onclick="deleteproduct(' . $sp['id'] . ')"></button>
            </td>
        </tr>';
        }
        if ($_POST['action'] == 'search') {
            $arr['pagin'] = '';
        } else {
            for ($i = 0; $i < ceil(($result1) / 5); $i++) {
                if ($i == $page - 1) {
                    $arr['pagin'] .= '<button type="button" class="btn btn-outline-secondary active" onclick="phantrang(' . $i + 1 . ')">' . $i + 1 . '</button>';
                } else  $arr['pagin'] .= '<button type="button" class="btn btn-outline-secondary" onclick="phantrang(' . $i + 1 . ')">' . $i + 1 . '</button>';
            }
        }
        $arr['tong'] = $result1;
    } else {
        $arr['arr1'] .= '<td colspan="6">Không tìm thấy</td>';
    }
    echo json_encode($arr);
}

//hiện chi tiết sản phẩm
function detail($id){
    $sql = "SELECT * FROM sanpham WHERE id=$id;";
    $result = executeSingleResult($sql);
    echo '
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
            <form class="form-floating" enctype="multipart/form-data" method="POST">
                <div class="row ">
                    <div class="col-md-6 offset-md-3">
                        <img style="object-fit: cover;" src="../picture/' . $result['img'] . '" class="rounded" alt="..." width="auto" height="200" id="imgproduct">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="inputGroupFile02" id="inputGroupFile02" value="' . $result['img'] . '">
                            <button onclick="uploadd()" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Upload</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" disabled name="codez" id="codez" value="' . $result['id'] . '">
                            <label for="floatingInput">Mã sản phẩm</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="namee" id="namee" value="' . $result['name'] . '">
                            <label for="floatingInput">Tên sản phẩm</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-1">
                            <label class="form-label m-0">Giới thiệu:</label>
                            <textarea name="gioithieu" id="gioithieu" class="form-control" aria-label="With textarea">' . $result['intro'] . '</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label m-0">Thể loại:</label>
                            <select class="form-select" name="theloai" id="theloai">
                                <option value="Zippo Armor" ' . (($result['category'] == 'Zippo Armor') ? 'selected' : "") . '>Zippo Armor</option>
                                <option value="Zippo Sterling Silver" ' . (($result['category'] == 'Zippo Sterling Silver') ? 'selected' : "") . '>Zippo Sterling Silver</option>
                                <option value="Zippo Base Models" ' . (($result['category'] == 'Zippo Base Models') ? 'selected' : "") . '>Zippo Base Models</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label m-0">Chất liệu:</label>
                            <select class="form-select" name="chatlieu" id="chatlieu">
                                <option value="Đồng" ' . (($result['material'] == 'Đồng') ? 'selected' : "") . '>Đồng</option>
                                <option value="Bạc" ' . (($result['material'] == 'Bạc') ? 'selected' : "") . '>Bạc</option>
                                <option value="Vàng" ' . (($result['material'] == 'Vàng') ? 'selected' : "") . '>Vàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label m-0">Xuất xứ:</label>
                            <select class="form-select" name="xuatxu" id="xuatxu">
                                <option value="Nhật Bản" ' . (($result['madeby'] == 'Nhật Bản') ? 'selected' : "") . '>Nhật Bản</option>
                                <option value="Hàn Quốc" ' . (($result['madeby'] == 'Hàn Quốc') ? 'selected' : "") . '>Hàn Quốc</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label m-0">Tình trạng:</label>
                            <select class="form-select" name="tinhtrang" id="tinhtrang">
                                <option value="1" ' . (($result['state'] == 1) ? 'selected' : "") . '>Còn hàng</option>
                                <option value="0" ' . (($result['state'] == 0) ? 'selected' : "") . '>Hết hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="" class="form-label m-0">Số lượng:</label>
                            <input type="number" class="form-control" name="amountt" id="amountt" placeholder="1" value="' . $result['amount'] . '">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label m-0">Giá:</label>
                            <input type="number" class="form-control" name="prices" id="prices" placeholder="1" value="' . $result['price'] . '">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="editproduct(' . $result['id'] . ')">Cập nhật</button>
        </div>
    </div>';
}

// cập nhật sản phẩm
function edit(){
    $anh = $_POST['inputGroupFile02'];
    $ma = $_POST['codez'];
    $ten = $_POST['namee'];
    $soluong = $_POST['amountt'];
    $gia = $_POST['prices'];
    $status = $_POST['tinhtrang'];
    $category = $_POST['theloai'];
    $material = $_POST['chatlieu'];
    $madeby = $_POST['xuatxu'];
    $intro = $_POST['gioithieu'];
    
    if (!preg_match('/^[0-9]{1,9}$/', $gia)) {
        die('Error');
    }

    if (!preg_match('/^[1-9]{1,2}$/', $soluong)) {
        die('Error');   
    }
    //Code xử lý, insert dữ liệu vào table
    $sql = "UPDATE sanpham SET img='$anh', `name`='$ten', `amount`='$soluong', `price`='$gia',
    `category`='$category', `material`='$material', `madeby`='$madeby', `intro`='$intro', `state`='$status' WHERE id=$ma";
    //die($sql);
    if (execute($sql)) {
        echo 'success';
    } else {
        echo "Error";
    }
}

//xóa sản phẩm
function deletedProduct($id) {
    $sql = "DELETE FROM sanpham WHERE id=$id";
    if (execute($sql)>0) {
        echo "success";
    } else {
        echo "error";
    }
}


function deleted1Page($idd){
    $sql = "DELETE FROM sanpham WHERE";
    //$idd = explode(',', $_POST["data"]);
    $i = 0;
    foreach ($idd as $id) {
        $i++;
        $sql .= " id ={$id}";
        if ($i < count($idd)) {
            $sql .= ' or';
        }
    }
    // die($sql);
    if (execute($sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
// //Hien danh sach san pham dang table
// if (isset($_POST["action"])) {
//     $arr = array('arr1' => '', 'pagin' => '', 'arr3' => 0);
//     $result = $result1 = $temp = $start = '';
//     if ($_POST["action"] == 'displaysanpham') {

//         $sql = "SELECT * FROM sanpham LIMIT 0,5";

//         $temp = "SELECT * FROM sanpham";
//     } else if ($_POST["action"] == 'search') {
//         $page = isset($_POST['page']) ? $_POST['page'] : 1;
//         $start = ($page - 1) * 5;

//         $sql = "SELECT * FROM sanpham where `id` like '%{$_POST['name']}%'";

//         $temp = $sql;

//         $sql .= " LIMIT $start, 5";
//     }
//     $result = executeResult($sql);
//     $result1 = countRow($temp);
//     //die($sql);
//     // in san pham
//     foreach ($result as $sp) {
//         $arr['arr1'] .= '<tr>
//         <th scope="row">
//             <div class="form-check">
//                 <input class="form-check-input" type="checkbox" value="' . $sp['id'] . '">
//                 <span>' . (++$start) . '</span>
//             </div>
//         </th>' .
//             '<td>
//             <img src="../picture/' . $sp["img"] . '"width="auto" height="80">
//             <span>' . $sp['name'] . '</span>
//         </td>' .
//             '<td>' . $sp['amount'] . '</td>
//         <td>' . number_format($sp['price'], 0, '.') . ' ₫</td>' .
//             '<td>' . '<span>' . (($sp['state'] == 1) ?  "Còn hàng" : "Hết hàng") . '</span></td>' .
//             '<td>
//             <button type="button" class="btn btn-outline-primary btn-sm" id="sua' . $sp['id'] . '" onclick="detail(' . $sp['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
//             <button class="btn btn-danger btn-sm" name="xoa" id="xoa' . $sp['id'] . '" onclick="deleteproduct(' . $sp['id'] . ')">X</button>
//         </td>
//     </tr>';
//     }
//     // in nut phan trang
//     for ($i = 0; $i < ceil(($result1) / 5); $i++) {
//         $arr['pagin'] .= '<button type="button" class="btn btn-outline-secondary" onclick="search(' . $i + 1 . ')">' . $i + 1 . '</button>';
//     }
//     $arr['arr3'] = $result1;
//     echo json_encode($arr);
// }

// thêm sản phẩm
function add(){
    //if ($_POST['action'] == "add") {
    if (isset($_POST["codez"])) {
        $ma = $_POST['codez'];
    }
    if (isset($_POST["inputGroupFile02"])) {
        $anh = $_POST['inputGroupFile02'];
    }
    if (isset($_POST["code"])) {
        $ma = $_POST['code'];
    }
    if (isset($_POST["namee"])) {
        $ten = $_POST['namee'];
    }
    if (isset($_POST["theloai"])) {
        $theloai = $_POST['theloai'];
    }
    if (isset($_POST["chatlieu"])) {
        $chatlieu = $_POST['chatlieu'];
    }
    if (isset($_POST["xuatxu"])) {
        $xuatxu = $_POST['xuatxu'];
    }
    if (isset($_POST["amountt"])) {
        $soluong = $_POST['amountt'];
    }
    if (isset($_POST["prices"])) {
        $gia = $_POST['prices'];
    }
    if (isset($_POST["tinhtrang"])) {
        $status = $_POST['tinhtrang'];
    }
    if (isset($_POST["gioithieu"])) {
        $intro = $_POST['gioithieu'];
    }

    if (!preg_match('/^[0-9]{1,2}$/', $soluong)) {
        echo 'Error';
        die();
    }

    if (!preg_match('/^[0-9]{1,8}$/', $gia)) {
        echo 'Error';
        die();
    }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO sanpham (id, img, `name`, amount, price, category, material, madeby, intro, `state`) 
        VALUES ('$ma','$anh','$ten','$soluong','$gia', '$theloai', '$chatlieu', '$xuatxu', '$intro', $status)";
    //die($sql);
    if (execute($sql)) {
        echo 'success';
    } else {
        echo "Error";
    }
}
//}

 //phan trang
// if (isset($_GET["page"])) {
//     $count = $_GET["page"];
//     $start = ($count - 1) * 5;
//     $sql = "SELECT * FROM sanpham LIMIT $start, 5";
//     $result = executeResult($sql);
//     foreach ($result as $sp) {
//         $start = $start + 1;
//         echo '<tr>
//         <th scope="row">
//             <div class="form-check">
//                 <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
//                 <span>' . $start . '</span>
//             </div>
//         </th>' .
//             '<td>
//             <img src="../picture/' . $sp["img"] . '"width="auto" height="100">
//             <span>' . $sp['name'] . '</span>
//         </td>' .
//             '<td>' . $sp['amount'] . '</td>
//             <td>' . number_format($sp['price'], 0, '.') . ' ₫</td>' .
//             '<td>
//             <select class="btn btn-light trangthai" name="tinhtrang">' .
//             '<option value="1"' . (($sp['state'] == 1) ? 'selected' : "") . '>Còn hàng</option>
//                 <option value="0" ' . (($sp['state'] == 0) ? 'selected' : "") . '>Hết hàng</option>
//             </select>
//         </td>' .
//             '<td>
//             <button class="btn btn-danger btn-sm" name="xoa" id="xoa' . $sp['id'] . '" onclick="deleteproduct(' . $sp['id'] . ')">Xóa</button>
//             <button type="button" class="btn btn-info btn-sm" id="sua' . $sp['id'] . '" onclick="detail(' . $sp['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
//         </td>
//     </tr>';
//     }
// }
