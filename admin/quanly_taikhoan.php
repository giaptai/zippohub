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
            <a class="nav-link" aria-current="page" href="quanly_makhuyenmai.php">Quản lý mã khuyến mãi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./quanly_donhang.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_sanpham.php">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản lý tài khoản</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-floating" enctype="multipart/form-data" method="POST">
                        <!-- Name input -->
                        <div class="form-floating mb-4">
                            <input type="search" id="namee" class="form-control" placeholder="1" name="namee" value="' . $hovaten . '">
                            <label class="form-label" for="floatingInput">Họ và tên</label>
                        </div>
                        <!-- Email input -->
                        <div class="form-floating mb-4">
                            <input type="email" id="emaill" class="form-control" placeholder="1" name="emaill" value="' . $email . '">
                            <label class="form-label" for="form5Example2">Email</label>
                        </div>
                        <!-- Email input -->
                        <div class="form-floating mb-4">
                            <input type="password" id="passwordd" class="form-control" placeholder="1" name="passwordd" value="' . $matkhau . '">
                            <label class="form-label" for="form5Example2">Mật khẩu</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="tel" id="phonee" class="form-control" placeholder="1" name="phonee" value="' . $sdt . '">
                            <label class="form-label" for="form5Example2">Số điện thoại</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="addresss" rows="10" placeholder="1" name="addresss">' . $diachi . '</textarea>
                            <label class="form-label" for="floatingInput">Địa chỉ</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>

    <div class="d-block m-auto" style="width: 90%;">
        <div class="container m-0 p-0 mt-3">
            <div class="row justify-content-md-between">

                <div class="col-md-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        <input type="search" class="form-control" placeholder="Email" aria-label="Email" id="button-addon1">
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Số điện thoại</span>
                        <input type="search" class="form-control" placeholder="Số điện thoại" aria-label="Số điện thoại" id="button-addon2">
                    </div>
                </div>

                <div class="col col-lg-5">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Địa chỉ</span>
                        <input type="search" class="form-control" placeholder="Địa chỉ" id="button-addon3">
                    </div>
                </div>

                <div class="col-md-auto">
                    <button class="btn btn-outline-secondary" type="button" id="" onclick="search()">Tìm kiếm</button>
                </div>
            </div>
        </div>
        <?php
        require_once('../query.php');
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * 10;
        $result = executeResult("SELECT * FROM taikhoan LIMIT $start, 10");
        $count = countRow("SELECT * FROM taikhoan");
        ?>
        <table class="table align-middle caption-top" id="table_taikhoan">
            <caption>
                Quản lý tài khoản
                <a class="btn btn-success btn-sm" href="./quanly_taikhoan_them.php">Thêm tài khoản</a>
                <div type="button" class="btn btn-sm btn-outline-primary m-2" onclick="sendMail()">
                    Tổng tài khoản <span class="badge bg-danger" id="badge"><?= $count ?></span>
                </div>
            </caption>

            <thead>
                <tr>
                    <th scope="col" style="width:8%">
                        <label>STT</label>
                    </th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody id="table_tbody_taikhoan">
                <?php
                foreach ($result as $tk) {
                    echo '<tr>
                        <th scope="row"><label>' . ++$start . '</label></th>
                                <td>' . $tk['fullname'] . '</td>
                                <td>' . $tk['email'] . '</td>
                                <td>' . $tk['phone'] . '</td>
                                <td>' . $tk['address'] . '</td>
                                <td>' . (($tk['status'] == 1) ?  "Mở" : "Khóa")  . '</td>
                            <td>
                                <button class="btn btn-outline-warning btn-sm">Khóa</button>
                                <button onclick="details(' . $tk['id'] . ')" type="button" class="btn btn-outline-info btn-sm" id="detail' . $tk['id'] . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Chi tiết
                        </button>
                                </td>
                            </tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <td colspan="6" style="text-align:center">
                    <div class="align-items-center btn-group btn-group-sm" role="group" aria-label="First group" id="table_tfoot_taikhoan">
                        <?php
                        for ($i = 0; $i < ceil(($count) / 10); $i++) {
                            if ($i == $page - 1) {
                                echo '<button type="button" class="btn btn-outline-primary active" onclick="phantrang(' . $i + 1 . ')">' . $i + 1 . '</button>';
                            } else  echo '<button type="button" class="btn btn-outline-primary" onclick="phantrang(' . $i + 1 . ')">' . $i + 1 . '</button>';
                        }
                        ?>
                    </div>
                </td>
            </tfoot>
        </table>

        <!-- <div id="chart" style="width: 70%; height: 100px"></div> -->
    </div>
    <script>
        function sendMail() {
            console.log('mail');

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log((this.responseText));
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/taikhoan.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('sendmail');
        }

        function search() {
            s1 = document.getElementById('button-addon1').value;
            s2 = document.getElementById('button-addon2').value;
            s3 = document.getElementById('button-addon3').value;
            console.log(s1, s2, s3);
            s1 = document.getElementById('button-addon1').value;
            if (s1 == '' && s2 == '' && s3 == '') {
                ss = (window.location.search).search(/page/); // tìm từ khóa page nó trả về vị trí đầu tiên thấy
                if (ss == -1) {
                    phantrang(1);
                } else {
                    page = window.location.search.slice(ss); //xóa path search chỉ còn 'page=số nào đó'
                    page = page.split('=')[1]; // tách bởi dấu bằng rồi chọn số
                    phantrang(page);
                }
            } else {
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        console.log((this.responseText));
                        let s1 = JSON.parse(this.responseText).arr1;
                        let s2 = JSON.parse(this.responseText).arr2;
                        //let s3 = JSON.parse(this.responseText).arr3;
                        document.getElementById('table_tbody_taikhoan').innerHTML = s1;
                        document.getElementById('table_tfoot_taikhoan').innerHTML = s2;
                        //document.getElementById('badge').innerHTML = s3;

                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/taikhoan.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=search' +
                    '&email=' + s1 +
                    '&phone=' + s2 +
                    '&address=' + s3
                );
            }
        }

        function phantrang(p) {
            s1 = document.getElementById('button-addon1').value;
            s2 = document.getElementById('button-addon2').value;
            s3 = document.getElementById('button-addon3').value;
            console.log(s1, s2, s3);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log((this.responseText));
                    const nextURL = './quanly_taikhoan.php?page=' + p;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    //window.history.pushState(nextState, nextTitle, nextURL);
                    window.history.replaceState(nextState, nextTitle, nextURL);
                    let s1 = JSON.parse(this.responseText).arr1;
                    let s2 = JSON.parse(this.responseText).arr2;
                    //let s3 = JSON.parse(this.responseText).arr3;
                    document.getElementById('table_tbody_taikhoan').innerHTML = s1;
                    document.getElementById('table_tfoot_taikhoan').innerHTML = s2;
                    //document.getElementById('badge').innerHTML = s3;

                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/taikhoan.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=phantrang' +
                '&page=' + p +
                '&email=' + s1 +
                '&phone=' + s2 +
                '&address=' + s3
            ); 
            // xhttp.send('action=search' +'&page=' + p);
            }

            function details(id) {
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        //console.log(this.responseText);
                        document.getElementById('modal-content').innerHTML = this.responseText;
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/taikhoan.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=details&id=' + id);
            }

            function updateCus(e) {
                status = document.getElementById('trangthai').value;
                console.log(status);
                let row = document.getElementById('detail' + e).parentElement.parentElement;
                console.log(row.children[5]);
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        alert(this.responseText);
                        row.children[5].innerText = (status==1 ? 'Mở':'Khóa');
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/taikhoan.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=update' + '&status=' + status + '&id=' + e);
            }

            // function addRow() {
            //     let table = document.getElementById('table_taikhoan').getElementsByTagName('tbody')[0];
            //     let row = table.insertRow(0);
            //     row.insertCell(0).outerHTML = '<th scope="row"><div class="form-check">' +
            //         '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">' +
            //         '</div>' +
            //         '</th>';
            //     row.insertCell(1).outerHTML = "<td>Tiến</td>";
            //     row.insertCell(2).outerHTML = "<td>tienk192001@gmail.com</td>";
            //     row.insertCell(3).outerHTML = "<td>0921145258</td>";
            //     row.insertCell(4).outerHTML = "<td>99 An Dương Vương, phường 16, quận 8</td>";
            //     row.insertCell(5).outerHTML = "<td>" +
            //         '<button class="btn btn-warning btn-sm">Khóa</button>' +
            //         ' <button onclick="details(2165)" type="button" class="btn btn-info btn-sm" id="detail2165" data-bs-toggle="modal" data-bs-target="#exampleModal">' +
            //         'Chi tiết' +
            //         '</button></td>';

            // }

            // var DisplayData1 = function(){
            //     var xhttp = new XMLHttpRequest() || ActiveXObject();
            //     //Bat su kien thay doi trang thai cuar request
            //     xhttp.onreadystatechange = function() {
            //         //Kiem tra neu nhu da gui request thanh cong
            //         if (this.readyState == 4 && this.status == 200) {
            //             //In ra data nhan duoc
            //             //addData(this.responseText);
            //             document.getElementById('table_tfoot_taikhoan').innerHTML=this.responseText;
            //         }
            //     }
            //     //cau hinh request
            //     xhttp.open('POST', './taikhoan/them_sua_xoa_taikhoan.php', true);
            //     //cau hinh header cho request
            //     xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //     //gui request
            //     xhttp.send('data=hienphantrang');
            // }
            // DisplayData1();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>