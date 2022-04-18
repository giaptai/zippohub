<?php
require_once("../../query.php");

//Hien danh sach san pham dang table
//Code xử lý, lay dữ liệu tu database
if (isset($_POST["action"])) {
    $arr = array('arr1' => '', 'pagin' => '', 'arr3' => 0);
    $result=$result1=$temp=$start='';
    if ($_POST["action"] == 'displaysanpham') {
        
        $sql = "SELECT * FROM sanpham LIMIT 0,5";

        $temp = "SELECT * FROM sanpham";

    }else if ($_POST["action"] == 'search'){
        $page=isset($_POST['page']) ? $_POST['page']:1;
        $start=($page-1)*5;

        $sql = "SELECT * FROM sanpham where `name` like '%{$_POST['name']}%'";

        $temp=$sql;

        $sql.=" LIMIT $start, 5";
    }
    $result = executeResult($sql);
    $result1 = countRow($temp);
    //die($result1);
    // in san pham
    foreach ($result as $sp) {
        $arr['arr1'] .= '<tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="'.$sp['id'].'">
                <span>' . (++$start) . '</span>
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
            <button type="button" class="btn btn-outline-primary btn-sm" id="sua' . $sp['id'] . '" onclick="detail(' . $sp['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
            <button class="btn btn-danger btn-sm" name="xoa" id="xoa' . $sp['id'] . '" onclick="deleteproduct(' . $sp['id'] . ')">X</button>
        </td>
    </tr>';
    }
    // in nut phan trang
    for ($i = 0; $i < ceil(($result1) / 5); $i++) {
        $arr['pagin'] .= '<button type="button" class="btn btn-outline-secondary" onclick="search(' . $i + 1 . ')">' . $i + 1 . '</button>';
    }
    $arr['arr3'] = $result1;
    echo json_encode($arr);
}


//hiện chi tiết sản phẩm
if (isset($_GET["id"])) {
    $id = $_GET["id"];
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
                <div class="text-center mb-3">
                    <img src="../picture/' . $result['img'] . '" class="rounded" alt="..." width="auto" height="200" id="imgproduct">
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="inputGroupFile02" id="inputGroupFile02" value="' . $result['img'] . '">
                    <button onclick="uploadd()" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Upload</button>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-floating input-group-sm mb-3">
                    <input type="text" class="form-control " disabled  value="' . $result['id'] . '" placeholder="1" name="codez" id="codez" value="">
                        <label for="floatingInput">Mã sản phẩm</label>
                    </div>
                    <div class="form-floating input-group-sm mb-3" style="width:75%">
                    <input type="text" class="form-control" name="namee" id="namee" placeholder="1" value="' . $result['name'] . '">
                        <label for="floatingInput">Tên sản phẩm</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                <input type="number" class="form-control" name="amountt" id="amountt" placeholder="1" value="' . $result['amount'] . '">
                    <label for="floatingInput">Số lượng</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" class="form-control" name="prices" id="prices" placeholder="1" value="' . $result['price'] . '">
                    <label for="floatingInput">Giá</label>
                </div>
                <div class="form mb-3">
                    <label for="">Tình trạng</label>
                    <select class="btn btn-light" name="tinhtrang" id="tinhtrang">
                        <option value="1" ' . (($result['state'] == 1) ? 'selected' : "") . '>Còn hàng</option>
                        <option value="0" ' . (($result['state'] == 0) ? 'selected' : "") . '>Hết hàng</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="editproduct(' . $result['id'] . ')">Sửa</button>
        </div>
    </div>';
}

if (isset($_POST['edit'])) {
    // if ($_POST['action'] == "edit") {
        if (isset($_POST["inputGroupFile02"])) {
            $anh = $_POST['inputGroupFile02'];
        }
        if (isset($_POST["codez"])) {
            $ma = $_POST['codez'];
        }
        if (isset($_POST["namee"])) {
            $ten = $_POST['namee'];
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
        //Code xử lý, insert dữ liệu vào table
        $sql = "UPDATE sanpham SET img='$anh', name='$ten', 
        amount='$soluong',price='$gia', state=$status WHERE id='$ma'";

        if (execute($sql)) {
            echo '<div class="alert alert-success" role="alert">
            Sua du lieu thanh cong!
          </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
// }

//xóa sản phẩm
if (isset($_POST['deleted'])) {
    // if (($_POST["action"] == "deleted")) {
        $idd = $_POST["id"];
        $sql = "DELETE FROM sanpham WHERE id=$idd";
        if (execute($sql)) {
            echo "success";
        } else {
            echo "error";
        }
    }
// }

if (isset($_POST['deleted1page'])) {
        $sql = "DELETE FROM sanpham WHERE";
        $idd =explode(',', $_POST["data"]);
        $i=0;
        foreach ($idd as $id){
            $i++;
            $sql .= " id ={$id}";
            if($i < count($idd)){
                $sql.=' or';
            }
        }
        //die($sql);
        if (execute($sql)) {
            echo "success";
        } else {
            echo "error";
        }
    }

// thêm sản phẩm
if (isset($_POST['add'])) {
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
        //Code xử lý, insert dữ liệu vào table
        $sql = "INSERT INTO sanpham (id, img, `name`, amount, price, category, material, madeby, `state`) 
        VALUES ('$ma','$anh','$ten','$soluong','$gia', '$theloai', ' $chatlieu', '$xuatxu', $status)";
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

?>
