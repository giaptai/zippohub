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
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="quanly_makhuyenmai.php">Quản lý mã khuyến mãi</a>
        </li>
        <li class="nav-item bg-light">
            <a class="nav-link active" aria-current="page" href="#">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_sanpham.php">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_taikhoan.php">Quản lý tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_thongke.php">Thống kê</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Tài khoản</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
        </li>
    </ul>
    <!--  -->
    <div class="d-block m-auto" style="width: 90%;">
        <div class="container m-0 p-0 mt-3">
            <div class="row justify-content-md-between">
                <div class="col-md-auto">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked value="Tổng đơn">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng đơn<span class="badge bg-danger" id="badge_tongdon">0</span></label>
                </div>
                <div class="col-md-auto">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="Chờ xác nhận">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio2">Chờ xác nhận<span class="badge bg-danger" id="badge_choxacnhan">0</span></label>
                </div>
                <div class="col-md-auto">

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="Đã xác nhận">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã xác nhận<span class="badge bg-danger" id="badge_daxacnhan">0</span></label>
                </div>
                <div class="col-md-auto">

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="Đang giao">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio4">Đang giao<span class="badge bg-danger" id="badge_danggiao">0</span></label>
                </div>
                <div class="col-md-auto">

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="Đã giao">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio5">Đã giao<span class="badge bg-danger" id="badge_dagiao">0</span></label>
                </div>
                <div class="col-md-auto">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off" value="Đã hủy">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio6">Đã hủy<span class="badge bg-danger" id="badge_dahuy">0</span></label>
                </div>
                <div class="col-md-auto">
                    <div class="input-group input-group-sm ">
                        <input type="text" class="form-control" placeholder="Mã hóa đơn" id="ipsearch" value="">
                        <button class="btn btn-outline-secondary" type="button" id="timkiem" onclick="timkiem()">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table align-middle caption-top">
            <caption>Quản lý đơn hàng</caption>
            <thead>
                <tr>
                    <th scope="col" style="width:10%">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label>Tất cả</label>
                    </th>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tổng sản phẩm</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" style="width:auto">Thao tác</th>
                </tr>
            </thead>
            <tbody id="table_tbody_donhang">
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>
                    <td>1254254</td>
                    <td>22/02/2021</td>
                    <td>111</td>
                    <td>111</td>
                    <td>Chờ xác nhận</td>
                    <td>
                        <a class="btn btn-success btn-sm">Xác nhận</a>
                        <a class="btn btn-danger btn-sm">Hủy đơn</a>
                        <a class="btn btn-info btn-sm" href="./chitietdonhang.php">Chi tiết</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <script>
        function table_donhang() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    let s1 = JSON.parse(this.responseText).arr1;
                    let s2 = JSON.parse(this.responseText).tongdon;
                    let s3 = JSON.parse(this.responseText).choxacnhan;
                    let s4 = JSON.parse(this.responseText).daxacnhan;
                    let s5 = JSON.parse(this.responseText).danggiao;
                    let s6 = JSON.parse(this.responseText).dagiao;
                    let s7 = JSON.parse(this.responseText).dahuy;
                    document.getElementById('table_tbody_donhang').innerHTML = s1;
                    document.getElementById('badge_tongdon').innerHTML = s2;
                    document.getElementById('badge_choxacnhan').innerHTML = s3;
                    document.getElementById('badge_daxacnhan').innerHTML = s4;
                    //console.log(s4)
                    document.getElementById('badge_danggiao').innerHTML = s5;
                    document.getElementById('badge_dagiao').innerHTML = s6;
                    document.getElementById('badge_dahuy').innerHTML = s7;
                    //document.getElementById('table_tfoot_donhang').innerHTML = s2;
                    //console.log(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/donhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=displaydonhang');
        }
        table_donhang();

        for (let i = 0; i < document.querySelectorAll('input[type="radio"]').length; i++) {
            document.querySelectorAll('input[type="radio"]')[i].addEventListener('click', function() {
                console.log(document.querySelectorAll('input[type="radio"]')[i].value);
                let val = document.querySelectorAll('input[type="radio"]')[i].value;
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        document.getElementById('table_tbody_donhang').innerHTML = this.responseText;
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/donhang.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('status&value=' + val);
            })
        }

        function timkiem() {
            let val = document.getElementById('ipsearch').value;
            console.log(val);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    document.getElementById('table_tbody_donhang').innerHTML = this.responseText;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/donhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('timkiemma&value=' + val);
        }
        // var xhttp = new XMLHttpRequest() || ActiveXObject();
        // //Bat su kien thay doi trang thai cuar request
        // xhttp.onreadystatechange = function() {
        //     //Kiem tra neu nhu da gui request thanh cong
        //     if (this.readyState == 4 && this.status == 200) {
        //         //In ra data nhan duoc
        //         document.getElementById('table_tbody_donhang').innerHTML = this.responseText;
        //         const nextURL = './quanly_donhang.php?key='+s1;
        //         const nextTitle = 'My new page title';
        //         const nextState = {
        //             additionalInformation: 'Updated the URL with JS'
        //         };
        //         //window.history.pushState(nextState, nextTitle, nextURL);
        //         window.history.replaceState(nextState, nextTitle, nextURL);
        //     }
        // }
        // //cau hinh request
        // xhttp.open('GET', './PHP_Function/donhang.php?key='+s1, true);
        // //gui request
        // xhttp.send();
        //document.getElementById('phanloai').

        function confirm(id) {
            let s1 = document.getElementById('id' + id).parentElement.parentElement;
            console.log(s1.children[5]);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    s1.children[5].innerHTML = '<p class="mb-0 text-secondary" style="font-weight: 500;">Đã xác nhận</p>';
                    console.log(this.responseText);
                    // table_donhang();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/donhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=confirm&id=' + id);
        }

        function cancelOrder(id) {
            let s1 = document.getElementById('id' + id).parentElement.parentElement;
            console.log(s1.children[5]);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    s1.children[5].innerHTML = '<p class="mb-0 text-danger" style="font-weight: 500;">Đã hủy</p>';
                    console.log(this.responseText);
                    //table_donhang();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/donhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('cancelorder&id=' + id);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>