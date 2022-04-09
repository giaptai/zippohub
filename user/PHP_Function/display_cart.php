<?php
require_once('../../query.php');

session_start();

if (isset($_POST['data']) && isset($_POST['mua'])) {
    $id = $_POST['data'];
    $sql = "SELECT * FROM sanpham WHERE id={$id}";
    $product = executeSingleResult($sql);

    $item = array(
        'id' => $product['id'],
        'name' => $product['name'],
        'imagee' => $product['img'],
        'soluong' => 1,
        'gia' => $product['price']
    );
    
    if (isset($_SESSION["cart"])) {
        if (count($_SESSION["cart"]) == 5) {
            die("Đã đạt giới hạn mua hàng vui lòng đạt vip 15 để mua thêm");
        }

        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id]['soluong'] < $product['amount']) {
                $_SESSION['cart'][$id]["soluong"] += 1;
            } else {
                echo "bruh moment";
            }
        } else {
            $_SESSION['cart'][$id] = $item;
        }
    }else $_SESSION['cart'][$id] = $item;
}

if (isset($_POST["type"])) {
    if (($_POST["type"]) == "tangsoluong") {
        $id = $_POST["id"];
        ($_SESSION['cart'][$id]["soluong"] < 99) ? $_SESSION['cart'][$id]["soluong"] += 1 : 'Qua so luong';
        die();
    }
    if (isset($_POST["type"]) == "giamsoluong") {
        $id = $_POST["id"];
        if ($_SESSION['cart'][$id]["soluong"] == 1) {
            return;
        }
        $_SESSION['cart'][$id]["soluong"] -= 1;
    }
}


if (isset($_POST['action'])) {
    if ($_POST['action'] == 'listcart') {
        $dimemay = array('tbody' => '', 'tfooter' => '', 'checkoutOK' => '');
        $arr = array(
            'id' => '',
            'name' => '',
            'imagee' => '',
            'soluong' => 0,
            'gia' => 0
        );
        isset($_SESSION['cart']) ? $arr = $_SESSION['cart'] : $arr = [];
        $sumtien = 0;
        $sumsoluong = 0;
        foreach ($arr as $cart) {
            $sumtien = $sumtien + ($cart['soluong'] * $cart['gia']);
            $sumsoluong = $sumsoluong + $cart['soluong'];
            $dimemay['tbody'] .=
                '<tr>
                    <td scope="col"><input class="form-check-input mt-0" type="checkbox" value="" ></td>
                    <td scope="col">
                        <div class="d-flex align-items-center">
                            <img src="../picture/' . $cart['imagee'] . '" class="img-fluid rounded-3" style="width: 100px;" alt="Book">
                            <div class="flex-column ms-4">
                                <p class="mb-2">' . $cart['name'] . '</p>
                            </div>
                        </div>
                    </td>
                    <td scope="col">' . number_format($cart['gia']) . '</td> 
                    <td>
                        <div class="input-group">
                            <button class="subtract btn btn-outline-primary btn-sm" onclick="subtract(this)" value="' . $cart['id'] . '"><i class="bi bi-dash-lg"></i></button>
                            <input type="text" min="1" max="99" step="1" disabled style="text-align: center; width: 3rem;" class="btn btn-outline-primary" id="ditmem' . $cart['id'] . '" value="' . number_format($cart['soluong']) . '">
                            <button class="add btn btn-outline-primary btn-sm" value="' . $cart['id'] . '" onclick="add(this)"><i class="bi bi-plus-lg"></i></button>
                        </div>
                    </td>
                    <td scope="col">' . number_format($cart['soluong'] * $cart['gia']) . '</td>
                    <td scope="col"><button class="btn btn-danger btn-sm" id="id' . $cart["id"] . '" onclick="dele(' . $cart["id"] . ')">Xóa</button></td>
                </tr>';
        }
        $dimemay['tfooter'] = '<tr>
            <td colspan="4" style="text-align: right;" class="fw-bolder">Tổng:</td>
            <td>' . number_format($sumtien) . '</td>
            <td><a class="btn btn-outline-warning" id="deletedall" onclick="deletedAll()">Xóa tất cả</a></td>
        </tr>';
        $dimemay['checkoutOK'] = '<p class="card-text">' . number_format($sumtien) . '</p>
        <b class="card-text">' . number_format($sumtien) . '</b>';
        echo json_encode($dimemay);
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'dele') {
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'deletedall') {
        unset($_SESSION['cart']);
    }
}

if(isset($_POST['checkout']) ){
    if( isset($_SESSION['iduser']) ){
        echo 'success';
    }else echo 'fail';
}

// if(isset($_POST['data']) && isset($_POST['em'])){
//     if($_POST['em']==$_SESSION['email']){
//         $em=$_SESSION['email'];
//         $sql1="SELECT * FROM taikhoan WHERE email='$em'";
//         $query1=mysqli_query($conn, $sql1);
//         if(mysqli_num_rows($query1)>0){
//             while($row=mysqli_fetch_assoc($query1)){
//                 $s1=$row['fullname'];
//                 $s2=$row['phone'];
//                 $s3=$row['address'];
//             }
//         echo '<div class="row g-3">
//         <div class="col-12 input-group-lg">
//             <label for="firstName" class="form-label">Họ và tên</label>
//             <input type="text" class="form-control" id="firstName" placeholder="" value="'.$s1.'" required="">
//             <div class="invalid-feedback">
//                 Valid first name is required.
//             </div>
//         </div>

//         <div class="col-12 input-group-lg">
//             <label for="firstName" class="form-label">Email</label>
//             <input type="text" class="form-control" id="firstName" placeholder="" value="'.$_SESSION['email'].'" required="">
//             <div class="invalid-feedback">
//                 Valid first name is required.
//             </div>
//         </div>

//         <div class="col-12 input-group-lg">
//             <label for="tel" class="form-label">Số điện thoại</label>
//             <input type="tel" class="form-control" id="email" placeholder="" value="'.$s2.'">
//             <div class="invalid-feedback">
//                 Please enter a valid email address for shipping updates.
//             </div>
//         </div>

//         <div class="col-12 input-group-lg">
//             <label for="address" class="form-label">Địa chỉ</label>
//             <input type="text" class="form-control" id="address" value="'.$s3.'" placeholder="" required="" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
//             <div class="invalid-feedback">
//                 Please enter your shipping address.
//             </div>
//             <div class="collapse" id="collapseExample">
//                 <div class="card card-body">
//                     <div class="list-group">
//                         <a href="#" class="list-group-item list-group-item-action" aria-current="true">
//                             <div class="d-flex w-100 justify-content-between">
//                                 <h6 class="">Nguyễn Vĩnh Tiến</h6>
//                                 <!-- <span class="input-group-text btn-success btn-sm">xác nhận</span> -->
//                                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
//                             </div>
//                             <p class="mb-1">99 An Dương Vương, Phường 16, Quận 8</p>
//                             <small>0921145253</small>
//                         </a>
//                         <a href="#" class="list-group-item list-group-item-action" aria-current="true">
//                             <div class="d-flex w-100 justify-content-between">
//                                 <h6 class="">Toàn kon tum FAKE</h6>
//                                 <button type="button" class="btn btn-outline-primary btn-sm">Chọn</button>
//                             </div>
//                             <p class="mb-1">99 An Dương Vương, Phường 16, Quận 8</p>
//                             <small>0914545253</small>
//                         </a>
//                     </div>
//                 </div>
//             </div>
//         </div>

//     </div>';
//         }
//     }
// }


