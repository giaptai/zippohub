<!--  -->
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
                <label class="form-control">Mã đơn hàng: </label>
            </div>
            <div class="form-group">
                <label class="form-control">Tổng số tiền: VNĐ</label>
            </div>
            <div class="form-group">
                <label class="form-control">Nội dung thanh toán:</label>
            </div>
            <div class="form-group">
                <label class="form-control">Mã phản hồi (vnp_ResponseCode):</label>
            </div>
            <div class="form-group">
                <label class="form-control">Mã giao dịch của VNPAY: </label>
            </div>
            <div class="form-group">
                <label class="form-control">Mã Ngân hàng:</label>
            </div>
            <div class="form-group">
                <label class="form-control">Thời gian thanh toán:</label>
            </div>
            <div class="form-group">
                <label class="form-control">Người thanh toán: </label>
            </div>
            <div class="form-group">
                <label class="form-control">Kết quả: </label>
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