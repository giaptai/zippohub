<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul class="nav nav-tabs justify-content-end">
        <li class="nav-item ">
            <a class="nav-link active " href="#">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="quanly_makhuyenmai.php">Quản lý mã khuyến mãi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./quanly_donhang.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_sanpham.php">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_taikhoan.php">Quản lý tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?exit">Quay lại ZippoHub</a>
        </li>
        <?php
        if (isset($_GET['exit'])) {
            session_start();
            unset($_SESSION['email']);
            unset($_SESSION['iduser']);
            unset($_SESSION['cart']);
            header('Location:../index.php');
        }
        ?>
    </ul>
    <?php
    require_once('../query.php');
    $result1 = countRow("SELECT * FROM sanpham");
    $result2 = countRow("SELECT * FROM taikhoan");
    $result3 = countRow("SELECT * FROM hoadon");
    $result4 = countRow("SELECT * FROM makhuyenmai");
    ?>
    <div class="container-md" style="min-height: 906px;">
        <div class="row w-100">
            <div class="row row-cols-1 row-cols-md-4 g-2 mb-3 justify-content-between">
                <div class="col text-white ">
                    <div class="card h-100">
                        <div class="card-body bg-primary">
                            <h1 class="card-title"><?= number_format($result1) ?></h1>
                            <p class="card-text">Sản phẩm</p>
                        </div>
                        <div class="card-footer bg-primary">
                            <a class="text-white" href="./quanly_sanpham.php">Danh sách sản phẩm</a>
                        </div>
                    </div>
                </div>
                <div class="col text-white">
                    <div class="card h-100">
                        <div class="card-body bg-warning">
                            <h1 class="card-title"><?= number_format($result2) ?></h1>
                            <p class="card-text">Tài khoản</p>
                        </div>
                        <div class="card-footer bg-warning">
                            <a class="text-white" href="./quanly_taikhoan.php">Danh sách tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col text-white">
                    <div class="card h-100">
                        <div class="card-body bg-danger">
                            <h1 class="card-title"><?= number_format($result3) ?></h1>
                            <p class="card-text">Đơn hàng</p>
                        </div>
                        <div class="card-footer bg-danger">
                            <a class="text-white" href="./quanly_donhang.php">Danh sách đơn hàng</a>
                        </div>
                    </div>
                </div>
                <div class="col text-white">
                    <div class="card h-100">
                        <div class="card-body bg-success">
                            <h1 class="card-title"><?= number_format($result4) ?></h1>
                            <p class="card-text">Mã khuyến mãi</p>
                        </div>
                        <div class="card-footer bg-success">
                            <a class="text-white" href="./quanly_makhuyenmai.php">Danh sách mã khuyến mãi</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <select class="form-control" id="yearly">
                    <option value="" selected disabled hidden>Theo năm</option>
                    <option value="2022-12-31">2022</option>
                    <option value="2021-12-31">2021</option>
                    <option value="2020-12-31">2020</option>
                    <option value="2019-12-31">2019</option>
                    <option value="2018-12-31">2018</option>
                    <option value="2017-12-31">2017</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-control" id="12-month-back">
                    <option value="" disabled selected hidden>Trong 12 tháng trở lại</option>
                    <option value="2022-12-31">2022-12</option>
                    <option value="2022-11-30">2022-11</option>
                    <option value="2022-10-31">2022-10</option>
                    <option value="2022-09-30">2022-09</option>
                    <option value="2022-08-31">2022-08</option>
                    <option value="2022-07-31">2022-07</option>
                    <option value="2022-06-30">2022-06</option>
                    <option value="2022-05-31">2022-05</option>
                    <option value="2022-04-30">2022-04</option>
                    <option value="2022-03-31">2022-03</option>
                    <option value="2022-02-28">2022-02</option>
                    <option value="2022-01-31">2022-01</option>
                    <option value="2021-12-31">2021-12</option>
                    <option value="2021-11-30">2021-11</option>
                    <option value="2021-10-31">2021-10</option>
                    <option value="2021-09-30">2021-09</option>
                    <option value="2021-08-31">2021-08</option>
                    <option value="2021-07-31">2021-07</option>
                    <option value="2021-06-30">2021-06</option>
                    <option value="2021-05-31">2021-05</option>
                    <option value="2021-04-30">2021-04</option>
                    <option value="2021-03-31">2021-03</option>
                    <option value="2021-02-28">2021-02</option>
                    <option value="2021-01-31">2021-01</option>
                </select>
            </div>
            <!-- <div class="col-md-6">
                    <select class="form-control" id="choose-stat">
                        <option value="" disabled selected hidden>Chọn thông tin cần thống kê</option>
                        <option value="income">Thống kê thu nhập</option>
                        <option value="orders">Thống kê đơn hàng đã đặt</option>
                        <option value="ticket">Thống kê vé đã bán</option>
                        <option value="ticket-type">Thống kê loại vé đã bán</option>
                    </select>
                </div> -->
        </div>
        <div class="">
            <canvas id="Chart"></canvas>
        </div>
    </div>
    <div>
        <footer class="text-center text-lg-start bg-dark text-muted">
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © <?php echo date("Y"); ?> Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('Chart').getContext('2d');
        let myChart;

        function Income(label, labels, data, type) {
            myChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        let yearly = document.getElementById("yearly")
        let monthback = document.getElementById("12-month-back")

        monthback.addEventListener("change", () => {
            yearly.value = ""
            if (myChart) {
                myChart.destroy()
            }
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let Obj = JSON.parse(this.responseText)
                    Income('VND', Obj.Date, Obj.Total, 'bar')
                }
            }
            xhttp.open('POST', './PHP_Function/thongke.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send('action' + '&date=' + monthback.value);
        })
        yearly.addEventListener("change", () => {
            monthback.value = ""
            if (myChart) {
                myChart.destroy()
            }
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let Obj = JSON.parse(this.responseText)
                    Income('VND', Obj.Date, Obj.Total, 'bar')
                }
            }
            xhttp.open('POST', './PHP_Function/thongke.php', true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send('action' + '&date=' + yearly.value);
        })

        var xhttp = new XMLHttpRequest() || ActiveXObject();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let Obj = JSON.parse(this.responseText)
                Income('VND', Obj.Date, Obj.Total, 'bar')
            }
        }
        xhttp.open('POST', './PHP_Function/thongke.php', true);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send('action' + '&date=' + "2022-12-31");
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>