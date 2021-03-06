<?php ob_start();
session_start();
require_once("../query.php");
require_once("./config.php");
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}
unset($inputData['vnp_SecureHashType']);
unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = $Result = $MaKhuyenMai = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . $key . "=" . $value;
    } else {
        $hashData = $hashData . $key . "=" . $value;
        $i = 1;
    }
}
$secureHash = hash('sha256', $vnp_HashSecret . $hashData);
if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        $PaymentArray = array(
            "Total" => $_GET['vnp_Amount'] / 100, "Note" => $_GET['vnp_OrderInfo'],
            "vnp_response_code" => $_GET['vnp_ResponseCode'],
            "code_vnpay" => $_GET['vnp_TransactionNo'], "BankCode" => $_GET['vnp_BankCode']
        );
        if (mysqli_num_rows(execute("select * from payments where code_vnpay= '" . $PaymentArray["code_vnpay"] . "'")) != 0) {
            return;
        }
        $paymentadd = execute("INSERT INTO payments(OrderID, Total, Note, vnp_response_code, code_vnpay, BankCode, PaymentTime) 
        VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $_SESSION["Order"]["TotalPrice"] . "','" . $PaymentArray["Note"] . "',
            '" . $PaymentArray["vnp_response_code"] . "','" . $PaymentArray["code_vnpay"] . "','" . $PaymentArray["BankCode"] . "','" . $_SESSION["Order"]["OrderDate"] . "')");
        $orderadd = execute("INSERT INTO hoadon(id_hoadon, id_user, ngaymua, fullname, phone, address,
         total_product, magiamgia, total_money, statuss)
        VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $_SESSION["iduser"] . "','" . $_SESSION["Order"]["OrderDate"] . "',
        '" . $_SESSION["Order"]["Fullname"] . "','" . $_SESSION["Order"]["Phonenumber"] . "','" .
            $_SESSION["Order"]["Address"] . "','" . $_SESSION["Order"]["Quantity"] . "','" .
            $_SESSION["Order"]["PromoCode"] . "','" . $_SESSION["Order"]["TotalPrice"] . "','Ch???? xa??c nh????n')");
        foreach ($_SESSION['cart'] as $cart) {
            execute("INSERT INTO chitiethoadon(id_hoadon, id_sanpham, amount, total) 
            VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $cart['id'] . "','" . $cart['soluong'] . "','" . ($cart['soluong'] * $cart['gia']) . "')");
        }
        if ($_SESSION["Order"]["PromoCode"] != "")
            execute("update khuyenmai_khachhang set sudung=0 where makhuyenmai='" . $_SESSION["Order"]["PromoCode"] . "' and manguoidung='" . $_SESSION["iduser"] . "'");
        $PromoArray = executeResult("select * from makhuyenmai where trangthai=1");
        $KhachHangPromoArray = executeResult("select * from khuyenmai_khachhang where manguoidung='" . $_SESSION["iduser"] . "'");
        $PromoArrayTemp = [];
        if ($KhachHangPromoArray != null) {
            foreach ($KhachHangPromoArray as $KhachHangPromo) {
                array_push($PromoArrayTemp, $KhachHangPromo["makhuyenmai"]);
            }
        }
        foreach ($PromoArray as $Promo) {
            if (!in_array($Promo["id_khuyenmai"], $PromoArrayTemp)) {
                $MaKhuyenMai = $Promo["id_khuyenmai"];
                execute("INSERT INTO khuyenmai_khachhang(makhuyenmai, manguoidung, sudung) VALUES ('" . $MaKhuyenMai . "','" . $_SESSION["iduser"] . "','1')");
                break;
            }
        }
        if ($MaKhuyenMai == "")
            $MaKhuyenMai = "Xin l???i nh??ng ch??ng t??i h???t m?? khuy???n m??i !";
        $Result = "Giao d???ch th??nh c??ng";
    } else {
        $Result = "Giao d???ch kh??ng th??nh c??ng";
    }
} else {
    $Result = "Chu k??? kh??ng h???p l???";
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Th??ng tin thanh to??n</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <script src="../library/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="../icon/favicon.ico">
    <link href="../user/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <style>
        .container {
            margin: 2.5rem auto;
        }

        .header {
            margin-bottom: 2rem;
            text-align: center;
            border-bottom: 1px solid grey;
        }

        .footer {
            border-top: 1px solid grey;
            text-align: center;
            margin-top: 7rem;
        }
    </style>
    <div class="container">
        <!-- step -->
        <div class="step-container row justify-content-md-center align-items-center mt-4">
            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">1</a>
                    <p><strong>Gio?? ha??ng</strong></p>
                </div>
            </div>

            <hr class="bg-primary col-2 rounded-pill" size="10">

            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">2</a>
                    <p><strong>Ki????m tra th??ng tin</strong></p>
                </div>
            </div>

            <hr class="bg-primary col-2 rounded-pill" size="10">

            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">3</a>
                    <p><strong>Thanh toa??n</strong></p>
                </div>
            </div>

            <hr class="bg-primary col-2 rounded-pill" size="10">

            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">4</a>
                    <p><strong>Hoa??n tha??nh</strong>
                </div>
                </p>
            </div>
        </div>
        <!-- step -->
        <div class="container">
            <div class="header clearfix">
                <h2 class="text-muted">Th??ng tin h??a ????n</h2>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label class="form-control">M?? ????n h??ng: <?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">T???ng s??? ti???n: <?php echo number_format($_GET['vnp_Amount'] / 100) ?> VN??</label>
                </div>
                <div class="form-group">
                    <label class="form-control">N???i dung thanh to??n: <?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">M?? ph???n h???i (vnp_ResponseCode): <?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">M?? giao d???ch c???a VNPAY: <?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">M?? Ng??n h??ng: <?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Th???i gian thanh to??n: <?php echo date("d-m-Y H:i:s", strtotime($_SESSION["Order"]["OrderDate"])) ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Ng?????i thanh to??n: <?php echo $_SESSION["Order"]["Fullname"] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">K???t qu???: <strong class="text-success"><?php echo $Result ?></strong></label>
                </div>
                <div class="form-group">
                    <label class="form-control">MA?? KHUY????N MA??I ????????C T????NG: <?php echo $MaKhuyenMai ?></label>
                </div>
                <a href="../index.php" class="btn btn-primary">Quay l???i</a>
            </div>
            <footer class="footer">
                <p>&copy; Qu???n l?? b??n b???t l???a zippo tr???c tuy???n 2022</p>
            </footer>
        </div>
        <script src="../config/CheckOut.js"></script>
</body>

</html>