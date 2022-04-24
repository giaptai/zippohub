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
        <li class="nav-item bg-light">
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
        <li class="nav-item ">
            <a class="nav-link active " href="#">Thống kê</a>
        </li>
    </ul>
    <!--  -->
    <div class="container-md mt-4">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio1">Ngày hôm nay</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio2" onclick="monthOK()">Tháng</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3" onclick="yearOK()">Năm</label>
        </div>
        <div class="">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php
    require_once('../query.php');
    $sql1 = executeSingleResult("SELECT sum(total_money) as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/01/01 00:00:00' and ngaymua <= '2022/01/31 23:59:59')");
    $sql2 = executeSingleResult("SELECT sum(total_money) as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/02/01 00:00:00' and ngaymua <= '2022/02/29 23:59:59')");
    $sql3 = executeSingleResult("SELECT sum(total_money) as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/03/01 00:00:00' and ngaymua <= '2022/03/31 23:59:59')");
    $sql4 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/04/01 00:00:00' and ngaymua <= '2022/04/30 23:59:59')");
    $sql5 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/05/01 00:00:00' and ngaymua <= '2022/05/31 23:59:59')");
    $sql6 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/06/01 00:00:00' and ngaymua <= '2022/06/30 23:59:59')");
    $sql7 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/07/01 00:00:00' and ngaymua <= '2022/07/31 23:59:59')");
    $sql8 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/08/01 00:00:00' and ngaymua <= '2022/08/31 23:59:59')");
    $sql9 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/09/01 00:00:00' and ngaymua <= '2022/09/30 23:59:59')");
    $sql10 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/10/01 00:00:00' and ngaymua <= '2022/10/31 23:59:59')");
    $sql11 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/11/01 00:00:00' and ngaymua <= '2022/11/30 23:59:59')");
    $sql12 = executeSingleResult("SELECT sum(total_money)as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/12/01 00:00:00' and ngaymua <= '2022/12/31 23:59:59')");
    //die("SELECT sum(total_money) as money FROM hoadon WHERE statuss='Đã xác nhận' AND (ngaymua >= '2022/01/01 00:00:00' and ngaymua <= '2022/01/31 23:59:59')");
    $sqlTuan=executeResult("select date_add('2022-04-16', interval  -WEEKDAY('2022-04-16')-1 day) FirstDayOfWeek, 
    date_add(date_add('2022-04-16', interval  -WEEKDAY('2022-04-16')-1 day), interval 7 day) LastDayOfWeek,
       week(curdate()) CurrentWeekNumber");

//        SELECT *
// FROM   your_table
// WHERE  YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)

    foreach($sqlTuan as $row){
        echo
        '<div class="btn-group" role="group" aria-label="Basic example" style="display:none;">
            <button type="button" class="btn btn-primary" id="n1" value="' . $sql1['money'] . '">Left</button>
            <button type="button" class="btn btn-primary" id="n2" value="' . $sql2['money'] . '">Left</button>
            <button type="button" class="btn btn-primary" id="n3" value="' . $sql3['money'] . '">Left</button>
            <button type="button" class="btn btn-primary" id="n4" value="' . $sql4['money'] . '">Left</button>
            <button type="button" class="btn btn-primary" id="n5" value="' . $sql5['money'] . '">Left</button>
            <button type="button" class="btn btn-primary" id="n6" value="' . $sql6['money'] . '">Left</button>
            <button type="button" class="btn btn-primary" id="n7" value="' . $sql7['money'] . '">Left</button>
        </div>';
    }
    echo
    '<div class="btn-group" role="group" aria-label="Basic example" style="display:none;">
        <button type="button" class="btn btn-primary" id="1" value="' . $sql1['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="2" value="' . $sql2['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="3" value="' . $sql3['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="4" value="' . $sql4['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="5" value="' . $sql5['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="6" value="' . $sql6['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="7" value="' . $sql7['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="8" value="' . $sql8['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="9" value="' . $sql9['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="10" value="' . $sql10['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="11" value="' . $sql11['money'] . '">Left</button>
        <button type="button" class="btn btn-primary" id="12" value="' . $sql12['money'] . '">Left</button>
    </div>';
    ?>

    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function thongke() {
            s1 = document.getElementById('1').value;
            s2 = document.getElementById('2').value;
            s3 = document.getElementById('3').value;
            s4 = document.getElementById('4').value;
            s5 = document.getElementById('5').value;
            s6 = document.getElementById('6').value;
            s7 = document.getElementById('7').value;
            s8 = document.getElementById('8').value;
            s9 = document.getElementById('9').value;
            s10 = document.getElementById('10').value;
            s11 = document.getElementById('11').value;
            s12 = document.getElementById('12').value;
            ss = [];
            ss.push(s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12);
            console.log(ss);
            return ss;
        }
        thongke();

        const labels = [
            'Tháng 1',
            'Tháng 2',
            'Tháng 3',
            'Tháng 4',
            'Tháng 5',
            'Tháng 6',
            'Tháng 7',
            'Tháng 8',
            'Tháng 9',
            'Tháng 10',
            'Tháng 11',
            'Tháng 12',
        ];
        data = {
            labels: labels,
            datasets: [{
                label: 'Doanh thu năm 2021',
                data: [ss[0], ss[1], ss[2], ss[3], ss[4], ss[5], ss[6],
                    ss[7], ss[8], ss[9], ss[10], ss[11], ss[12]
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        let config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        let myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        function monthOK() {
            myChart.destroy();
            const labels = [
                'Tuần 1',
                'Tuần 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12',
            ];
            data = {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu tháng 1 năm 2021',
                    data: [ss[0], ss[1], ss[2], ss[3], ss[4], ss[5], ss[6],
                        ss[7], ss[8], ss[9], ss[10], ss[11], ss[12]
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        }

        function yearOK() {
            myChart.destroy();

            data = {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu năm 2021',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',

                    data: [ss[0], ss[1], ss[2], ss[3], ss[4], ss[5], ss[6],
                        ss[7], ss[8], ss[9], ss[10], ss[11], ss[12]
                    ],
                }]
            };

            config1 = {
                type: 'line',
                data: data,
                options: {}
            };

            myChart = new Chart(
                document.getElementById('myChart'),
                config1
            );
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>