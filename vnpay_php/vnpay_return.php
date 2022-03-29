<?php ob_start();
session_start();
require_once("../connection.php");
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
        $_SESSION["Order"]["OrderDate"] = $Time;
        $PaymentArray = array(
            "OrderID" => $_GET["vnp_TxnRef"], "Total" => $_GET['vnp_Amount'] / 100, "Note" => $_GET['vnp_OrderInfo'],
            "PaymentTime" => $Time, "vnp_response_code" => $_GET['vnp_ResponseCode'],
            "code_vnpay" => $_GET['vnp_TransactionNo'], "BankCode" => $_GET['vnp_BankCode']
        );
        $_SESSION["Payment"] = $PaymentArray;
        if (mysqli_num_rows(Query("select * from payments where OrderID = '" . $_SESSION["Order"]["OrderID"] . "'")) == 1) {
            return;
        }
        if (AddOrder($_SESSION["Order"]) == 1 && AddPayment($_SESSION["Payment"]) == 1 && AddOrderDetails($_SESSION["OrderDetail"]) == 1) {
            $Result = "Giao dịch thành công";
        }
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
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/footer.css">
    <link rel="stylesheet" href="../boostrap/css/bootstrap.css">
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
                <label class="form-control">Người thanh toán: <?php echo $_SESSION['Member'][0]["Fullname"] ?></label>
            </div>
            <div class="form-group">
                <label class="form-control">Kết quả: <?php echo $Result ?></label>
            </div>
            <a href="../pages/member-orders.html" class="btn btn-primary">Quay lại</a>
        </div>
        <footer class="footer">
            <p>&copy; Quản lý bán vé máy bay trực tuyến 2021</p>
        </footer>
    </div>
    <script src="../config/CheckOut.js"></script>
</body>

</html>