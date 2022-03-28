<?php
include('../../query.php');
session_start();

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'display_info') {
        $sql = "SELECT * FROM taikhoan WHERE `id`={$_SESSION['iduser']}";
        $result = executeSingleResult($sql);
            echo '
                <div class="col-12 input-group-lg">
                <label for="firstName" class="form-label" >Họ và tên</label>
                <input type="text" id="fullname" class="form-control" placeholder="" value="' . $result['fullname'] . '" required="">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-12 input-group-lg">
                <label for="email" class="form-label">Email</label>
                <input type="email"  id="emaill" class="form-control" placeholder="" value="' . $result['email'] . '" required="">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="col-12 input-group-lg">
                <label for="tel" class="form-label" >Số điện thoại</label>
                <input type="tel" id="phonee" class="form-control" value="' . $result['phone'] . '" placeholder="">
                <div class="invalid-feedback">
                    Please enter a valid phone.
                </div>
            </div>

            <div class="col-12 input-group-lg">
                <label for="address" class="form-label" >Địa chỉ</label>
                <input type="text" class="form-control" id="address" onkeypress="addrInput()" value="' . $result['address'] . '" placeholder="" required="" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <div class="invalid-feedback">
                    Please enter your address.
                </div>
            </div>';
            }
}

// in ra danh sách địa chỉ của khách hàng
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'listaddr') {
        $sql = "SELECT * FROM diachikhach WHERE `id_user`={$_SESSION['iduser']}";
        $result = executeResult($sql);
        foreach($result as $arr) {
            echo ' <a onclick="clickaddr(' . $arr['id_addr'] . ')" id="addr' . $arr['id_addr'] . '" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="">' . $arr["name"] . '</h6>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            </div>
            <p class="mb-1">' . $arr["phone"] . '</p>
            <small>' . $arr["addr"] . '</small>
        </a>';
        }
    }
}

// tìm kiếm địa chỉ của khách hàng
if (isset($_GET['data'])) {
    $stringg = $_GET['data'];
    $sql = "SELECT * FROM diachikhach WHERE addr LIKE '%{$stringg}%' AND id_user={$_SESSION['iduser']}";
    $result = executeResult($sql);
    foreach ($result as $arr ) {
        echo ' <a onclick="clickaddr(' . $arr['id_addr'] . ')" id="addr' . $arr['id_addr'] . '" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="">' . $arr["name"] . '</h6>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            </div>
            <p class="mb-1">' . $arr["phone"] . '</p>
            <small>' . $arr["addr"] . '</small>
        </a>';
    }
}

// phần thanh toán nằm bên trái
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'display_cart') {
        $tongtien = 0;
        $summ=0;
        $stringg = array('lstcart' => '', 'checkoutbox' => '', 'tongg'=>'');
        $arr = array(
            'id' => '',
            'name' => '',
            'imagee' => '',
            'soluong' => 0,
            'gia' => 0
        );
        isset($_SESSION['cart']) ? $arr = $_SESSION['cart'] : $arr = [];
        foreach ($arr as $cart) {
            //$summ=$summ+1;
            $tongtien = $tongtien + ($cart['gia'] * $cart['soluong']);
            $stringg['lstcart'] .= '<li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">' . $cart['name'] . '</h6>
                <small class="text-muted">' . $cart['soluong'] . '</small>
            </div>
            <span class="text-muted">' . number_format($cart['gia']) . '</span>
        </li>';
        }
       
        $stringg['tongg'].='<span class="text-primary">Thanh toán</span>
        <span class="badge bg-primary rounded-pill">'. count($_SESSION['cart']).'</span>';

        $stringg['lstcart'] .= '<li class="list-group-item d-flex justify-content-between">
        <span>Tạm tính:</span>
        <strong>' . number_format($tongtien) . '</strong>
        </li>';
        if(isset($_GET['promo'])){
            $stringg['checkoutbox'] .= 
            '<h6 class="card-text">' . number_format($tongtien) . '</h6>
            <h6 class="card-text">' . number_format(30000) . '</h6>
            <h6 class="card-text">' . number_format(-15000) . '</h6>
            <h6 class="card-text">' . number_format($tongtien + 30000 - 15000) . '</h6>';
        }else {
            $stringg['checkoutbox'] .= 
            '<h6 class="card-text">' . number_format($tongtien) . '</h6>
            <h6 class="card-text">' . number_format(30000) . '</h6>
            <h6 class="card-text">' . number_format(0) . '</h6>
            <h6 class="card-text">' . number_format($tongtien + 30000 - 0) . '</h6>';
        }
        
        echo json_encode($stringg);
    }
}

if (isset($_POST['promo'])) {
    if ($_POST['promo'] == 'zipposgu') {
        $tongtien = 0;
        $summ=0;
        $stringg = array('checkoutbox' => '');
        $arr = array(
            'id' => '',
            'name' => '',
            'imagee' => '',
            'soluong' => 0,
            'gia' => 0
        );
        isset($_SESSION['cart']) ? $arr = $_SESSION['cart'] : $arr = [];
        foreach ($arr as $cart) {
            //$summ=$summ+1;
            $tongtien = $tongtien + ($cart['gia'] * $cart['soluong']);
        }
        $stringg['checkoutbox'] .= 
        '<h6 class="card-text">' . number_format($tongtien) . '</h6>
        <h6 class="card-text">' . number_format(30000) . '</h6>
        <h6 class="card-text">' . number_format(-15000) . '</h6>
        <h6 class="card-text">' . number_format($tongtien + 30000 - 15000) . '</h6>';
    }else{
        $stringg['checkoutbox'] .= 
        '<h6 class="card-text">' . number_format($tongtien) . '</h6>
        <h6 class="card-text">' . number_format(30000) . '</h6>
        <h6 class="card-text">' . number_format(0) . '</h6>
        <h6 class="card-text">' . number_format($tongtien + 30000 - 0) . '</h6>';
    }
    echo json_encode($stringg);
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'payment') {
        $id_hoadon = rand(100000, 999999);
        $id_user = $_SESSION['iduser'];
        $datee = date("d-m-Y"); //lấy ngày hiện tại, định dạng day-month-year
        $fullname = $_GET['name'];
        $phone = $_GET['phonee'];
        $address = $_GET['address'];
        echo ($datee);
        $sumtien = 0;
        $sumsoluong = 0;
        foreach ($_SESSION['cart'] as $cart) {
            $sumtien = $sumtien + ($cart['soluong'] * $cart['gia']);
            $sumsoluong = $sumsoluong + $cart['soluong'];
        }
        $sql = "INSERT INTO hoadon(id_hoadon, id_user, ngaymua, fullname, phone, address, total_product, total_money, statuss) 
        VALUES ('$id_hoadon', '$id_user', '$datee', '$fullname', '$phone', '$address','$sumsoluong','$sumtien', 'Chờ xác nhận')";

        if (execute($sql)) {
            foreach ($_SESSION['cart'] as $cart) {
                $product_id = $cart['id'];
                $amount = $cart["soluong"];
                $tol = $cart["soluong"]*$cart["gia"];
                $sql1 = "INSERT INTO chitiethoadon(id_hoadon, id_sanpham, amount, total) 
                VALUES ('$id_hoadon','$product_id','$amount','$tol')";
                execute($sql1);
            }
        unset($_SESSION['cart']);
        } else echo 'fail';
        // $sql1="INSERT INTO chitiethoadon(id_hoadon, id_sanpham, amount, total) 
        // VALUES ('$id_hoadon','[value-2]','[value-3]','[value-4]')";
    }
}
