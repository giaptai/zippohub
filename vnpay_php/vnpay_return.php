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
$hashData = $Result = "";
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
        $Time = date("Y-m-d h:i:s", strtotime($_GET['vnp_PayDate']));
        $PaymentArray = array(
            "Total" => $_GET['vnp_Amount'] / 100, "Note" => $_GET['vnp_OrderInfo'],
            "PaymentTime" => $Time, "vnp_response_code" => $_GET['vnp_ResponseCode'],
            "code_vnpay" => $_GET['vnp_TransactionNo'], "BankCode" => $_GET['vnp_BankCode']
        );
        $paymentadd = execute("INSERT INTO `payments`(`OrderID`, `Total`, `Note`, `vnp_response_code`, `code_vnpay`, `BankCode`, `PaymentTime`) 
        VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $_SESSION["Order"]["TotalPrice"] . "','" . $PaymentArray["Note"] . "',
            '" . $PaymentArray["vnp_response_code"] . "','" . $PaymentArray["code_vnpay"] . "','" . $PaymentArray["BankCode"] . "','" . $PaymentArray["PaymentTime"] . "')");

        echo "INSERT INTO `payments`(`OrderID`, `Total`, `Note`, `vnp_response_code`, `code_vnpay`, `BankCode`, `PaymentTime`) 
        VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $_SESSION["Order"]["TotalPrice"] . "','" . $PaymentArray["Note"] . "',
         '" . $PaymentArray["vnp_response_code"] . "','" . $PaymentArray["code_vnpay"] . "','" . $PaymentArray["BankCode"] . "','" . $PaymentArray["PaymentTime"] . "')";

        $orderadd = execute("INSERT INTO `hoadon`(`id_hoadon`, `id_user`, `ngaymua`, `fullname`, `phone`, `address`,
         `total_product`, `magiamgia`, `total_money`, `statuss`)
        VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $_SESSION["iduser"] . "','" . $_SESSION["Order"]["OrderDate"] . "',
        '" . $_SESSION["Order"]["Fullname"] . "','" . $_SESSION["Order"]["Phonenumber"] . "','" .
            $_SESSION["Order"]["Address"] . "','" . $_SESSION["Order"]["Quantity"] . "','" .
            $_SESSION["Order"]["PromoCode"] . "','" . $_SESSION["Order"]["TotalPrice"] . "','Chờ xác nhận')");
        foreach ($_SESSION['cart'] as $cart) {
            execute("INSERT INTO `chitiethoadon`(`id_hoadon`, `id_sanpham`, `amount`, `total`) 
            VALUES ('" . $_SESSION["Order"]["OrderID"] . "','" . $cart['id'] . "','" . $cart['soluong'] . "','" . ($cart['soluong'] * $cart['gia']) . "')");
        }
        $Result = "Giao dịch thành công";
    } else {
        $Result = "Giao dịch không thành công";
    }
} else {
    $Result = "Chu kỳ không hợp lệ";
} ?>
<!DOCTYPE html>
<html>

<head>
    <title>Thông tin thanh toán</title>
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
                    <p><strong>Giỏ hàng</strong></p>
                </div>
            </div>

            <hr class="bg-primary col-2 rounded-pill" size="10">

            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">2</a>
                    <p><strong>Kiểm tra thanh toán</strong></p>
                </div>
            </div>

            <hr class="bg-primary col-2 rounded-pill" size="10">

            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">3</a>
                    <p><strong>Thanh toán</strong></p>
                </div>
            </div>

            <hr class="bg-primary col-2 rounded-pill" size="10">

            <div class="col-md-auto">
                <div class="text-center">
                    <a type="button" class="btn btn-outline-primary btn-sm active">4</a>
                    <p><strong>Hoàn thành</strong>
                </div>
                </p>
            </div>
        </div>
        <!-- step -->
        <div class="container">
            <div class="header clearfix">
                <h2 class="text-muted">Thông tin hóa đơn</h2>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label class="form-control">Mã đơn hàng: <?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Tổng số tiền: <?php echo number_format($_GET['vnp_Amount'] / 100) ?> VNĐ</label>
                </div>
                <div class="form-group">
                    <label class="form-control">Nội dung thanh toán: <?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Mã phản hồi (vnp_ResponseCode): <?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Mã giao dịch của VNPAY: <?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Mã Ngân hàng: <?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Thời gian thanh toán: <?php echo date("d-m-Y h:i:s", strtotime($_GET['vnp_PayDate'])) ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Người thanh toán: <?php echo $_SESSION["Order"]["Fullname"] ?></label>
                </div>
                <div class="form-group">
                    <label class="form-control">Kết quả: <?php echo $Result ?></label>
                </div>
                <a href="../index.php" class="btn btn-primary">Quay lại</a>
            </div>
            <footer class="footer">
                <p>&copy; Quản lý bán bật lửa zippo trực tuyến 2022</p>
            </footer>
        </div>
        <script src="../config/CheckOut.js"></script>
</body>

</html>