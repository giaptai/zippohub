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
        foreach ($result as $arr) {
            echo ' <a onclick="clickaddr(' . $arr['id_addr'] . '); document.getElementById(`flexRadioDefault' . ($arr['id_addr']) . '`).checked=true" id="addr' . $arr['id_addr'] . '" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h6 class="">' . $arr["name"] . '</h6>
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault' . $arr['id_addr'] . '">
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
    foreach ($result as $arr) {
        echo ' <a href="#" onclick="clickaddr(' . $arr['id_addr'] . ')" id="addr' . $arr['id_addr'] . '" class="list-group-item list-group-item-action" aria-current="true">
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
if (isset($_POST['promocode'])) {
    $ntm = date('Y-m-d');
    $makhuyenmaiarray = executeResult("select * from makhuyenmai");
    foreach ($makhuyenmaiarray as $makhuyenmai) {
        if ($makhuyenmai["ngayhethan"] <  date('Y-m-d')) {
            execute("update makhuyenmai set trangthai = 0 where id_khuyenmai = '{$makhuyenmai['id_khuyenmai']}'");
        }
    }
    $discount = $_POST['promocode'];
    $result = executeSingleResult("SELECT * FROM makhuyenmai WHERE id_khuyenmai='{$discount}' and trangthai=1");
    $tongtien = $summ = 0;
    $stringg = array('lstcart' => '', 'checkoutbox' => '', 'tongg' => '', 'response' => '');
    $arr = array(
        'id' => '',
        'name' => '',
        'imagee' => '',
        'soluong' => 0,
        'gia' => 0
    );
    if ($result == '') {
        $stringg["response"] = 'error';
    } else {
        $stringg["response"] = 'success';
    }
    isset($_SESSION['cart']) ? $arr = $_SESSION['cart'] : $arr = [];
    foreach ($arr as $cart) {
        $tongtien = $tongtien + ($cart['gia'] * $cart['soluong']);
        $stringg['lstcart'] .= '<li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">' . $cart['name'] . '</h6>
                <small class="text-muted">' . $cart['soluong'] . '</small>
            </div>
            <span class="text-muted">' . number_format($cart['gia']) . '</span>
        </li>';
    }

    $stringg['tongg'] .= '<span class="text-primary">Thanh toán</span>
        <span class="badge bg-primary rounded-pill">' . count($_SESSION['cart']) . '</span>';

    $stringg['lstcart'] .= '<li class="list-group-item d-flex justify-content-between">
        <span>Tạm tính:</span>
        <strong>' . number_format($tongtien) . '</strong>
        </li>';
    if ($result) {
        $stringg['checkoutbox'] .=
            '<h6 class="card-text">' . number_format($tongtien) . '</h6>
                <h6 class="card-text">' . number_format(30000) . '</h6>
                <h6 class="card-text">' . number_format($result['giamgia']) . '</h6>
                <h6 class="card-text">' . number_format($tongtien + 30000 - $result['giamgia']) . '</h6>';
    } else {
        $stringg['checkoutbox'] .=
            '<h6 class="card-text">' . number_format($tongtien) . '</h6>
            <h6 class="card-text">' . number_format(30000) . '</h6>
            <h6 class="card-text">' . number_format(0) . '</h6>
            <h6 class="card-text">' . number_format($tongtien + 30000 - 0) . '</h6>
            <script>alert("Ma khuyen mai khong ton tai hoac het han")</script>';
    }
    echo json_encode($stringg);
}


if (isset($_GET['payment'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $OrderDate = date("Y-m-d H:i:s");
    $id_user = $_SESSION['iduser'];
    $OrderID = date("Ymdhis");
    $Fullname = $_GET['name'];
    $Phonenumber = $_GET['phone'];
    $Address = $_GET['address'];
    $makhuyenmai = '';
    $result = 0;
    $ntm = date('Y-m-d');
    if (!empty($_GET['magiamgia'])) {
        $makhuyenmai = $_GET['magiamgia'];
        $result = executeSingleResult("SELECT * FROM makhuyenmai WHERE id_khuyenmai='{$makhuyenmai}' AND ngayhethan <= '$ntm'");
    }
    $TotalPrice = 0;
    $Quantity = 0;
    foreach ($_SESSION['cart'] as $cart) {
        $TotalPrice += ($cart['soluong'] * $cart['gia']);
        $Quantity += $cart['soluong'];
    }
    $_SESSION["Order"] = array(
        "OrderID" => $OrderID, "OrderDate" => $OrderDate, "TotalPrice" => strval($TotalPrice - $result['giamgia'] + 30000), "Fullname" => $Fullname,
        "Phonenumber" => $Phonenumber, "Address" => $Address, "Quantity" => strval($Quantity), "PromoCode" => $makhuyenmai,
    );
}
