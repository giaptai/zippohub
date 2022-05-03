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
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./quanly_donhang.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Quản lý sản phẩm</a>
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

    <!-- Modal Them san pham -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-dialog">
            <!-- <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <form class="form-floating" enctype="multipart/form-data" method="POST">
                        <div class="text-center mb-3">
                            <img src="../picture/" class="rounded" alt="..." width="auto" height="200">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="inputGroupFile02" id="inputGroupFile02" value="">
                            <button onclick="uploadd()" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Upload</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating input-group-sm mb-3">
                                <input type="text" class="form-control " disabled placeholder="1" name="codez" id="codez" value="">
                                <label for="floatingInput">Mã sản phẩm</label>
                            </div>
                            <div class="form-floating input-group-sm mb-3" style="width:75%">
                                <input type="text" class="form-control" name="namee" id="namee" placeholder="1" value="">
                                <label for="floatingInput">Tên sản phẩm</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="amountt" id="amountt" placeholder="1" value="">
                            <label for="floatingInput">Số lượng</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="prices" id="prices" placeholder="1" value="">
                            <label for="floatingInput">Giá</label>
                        </div>
                        <div class="form mb-3">
                            <label for="">Tình trạng</label>
                            <select class="btn btn-light" name="tinhtrang" id="tinhtrang">
                                <option value="1">Còn hàng</option>
                                <option value="0">Hết hàng</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Thêm</button>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Modal chi tiet san pham -->

    <div class="d-block m-auto" style="width: 90%;">
        <div class="container m-0 p-0 mt-2">
            <div class="row justify-content-md-between">
                <div class="col-md-auto">
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-danger" type="button" id="button-addon2" onclick="xoa1trang()">Xóa tất cả</button>
                    </div>
                </div>
                <div class="col ">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Mã sản phẩm</span>
                        <input type="search" class="form-control" placeholder="Mã sản phẩm" aria-label="Email" id="button-addon1">
                    </div>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="search(1)">Tìm kiếm</button>
                </div>
            </div>
        </div>
        <?php
        require_once('../query.php');
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * 5;
        $result = executeResult("SELECT * FROM sanpham LIMIT $start,5");
        $count = countRow("SELECT * FROM sanpham");
        ?>
        <table class="table align-middle caption-top">
            <caption>
                Quản lý sản phẩm
                <a type="button" class="btn btn-success btn-sm" href="./quanly_sanpham_them.php">Thêm sản phẩm</a>
                <div type="button" class="btn btn-outline-primary btn-sm m-2">
                    Tổng sản phẩm <span class="badge bg-danger" id="badge"><?= $count ?></span>
                </div>
            </caption>

            <thead>
                <tr>
                    <th scope="col" class="w-auto">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault0">
                        <label>STT</label>
                    </th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" style="width:9rem">Thao tác</th>
                </tr>
            </thead>
            <tbody id="table_tbody_sanpham">
                <?php
                foreach ($result as $sp) {
                    echo '<tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="' . $sp['id'] . '">
                                <span>'.(++$start).' #'.$sp['id'] .'</span>
                            </div>
                        </th>' .
                        '<td>
                            <img src="../picture/' . $sp["img"] . '"width="auto" height="80">
                            <span>' . $sp['name'] . '</span>
                        </td>' .
                        '<td>' . $sp['amount'] . '</td>
                        <td>' . number_format($sp['price'], 0, '.') . ' ₫</td>' .
                        '<td>' . '<span>' . (($sp['state'] == 1) ?  "Còn hàng" : "Hết hàng") . '</span></td>' .
                        '<td>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="sua' . $sp['id'] . '" onclick="detail(' . $sp['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
                            <button class="btn btn-danger btn-sm" name="xoa" id="xoa' . $sp['id'] . '" onclick="deleteproduct(' . $sp['id'] . ')">X</button>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <td colspan="6" style="text-align:center">
                    <div class="align-items-center btn-group btn-group-sm" role="group" aria-label="First group" id="table_tfoot_sanpham">
                        <?php
                        // in nut phan trang
                        for ($i = 0; $i < ceil(($count) / 5); $i++) {
                            if($i==$page-1){
                                echo '<button type="button" class="btn btn-outline-secondary active" onclick="phantrang(' . $i + 1 . ')">' . $i + 1 . '</button>';
                            }else  echo '<button type="button" class="btn btn-outline-secondary" onclick="phantrang(' . $i + 1 . ')">' . $i + 1 . '</button>';
                           
                        }
                        ?>
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
    <script>
        function uploadd() {
            var s = document.getElementById("inputGroupFile02");
            var ss = s.value.replace(/C:\\fakepath\\/, '');
            document.getElementsByClassName("rounded")[0].src = "../picture/" + ss;
        }

        function search(p) {
            s1 = document.getElementById('button-addon1').value;
            if (s1 == '') {
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
                        console.log(this.responseText);
                        let arr1 = JSON.parse(this.responseText).arr1;
                        let pagin = JSON.parse(this.responseText).pagin;
                        document.getElementById('table_tbody_sanpham').innerHTML = arr1;
                        document.getElementById('table_tfoot_sanpham').innerHTML = pagin;
                        document.getElementById('flexCheckDefault0').checked = false;
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/sanpham.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=search&id=' + s1);
            }
        }

        function phantrang(p) {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    const nextURL = './quanly_sanpham.php?page=' + p;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    //window.history.pushState(nextState, nextTitle, nextURL);
                    window.history.replaceState(nextState, nextTitle, nextURL);
                    let arr1 = JSON.parse(this.responseText).arr1;
                    let pagin = JSON.parse(this.responseText).pagin;
                    document.getElementById('table_tbody_sanpham').innerHTML = arr1;
                    document.getElementById('table_tfoot_sanpham').innerHTML = pagin;
                    document.getElementById('flexCheckDefault0').checked = false;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=phantrang&page=' + p);
        }

        function detail(e) {
            console.log(e);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    // Chèn phản hồi từ máy chủ vào một phần tử HTML
                    document.getElementById('modal-dialog').innerHTML = this.responseText;
                }
            };
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=detail&id=' + e);
        }

        document.getElementById('flexCheckDefault0').addEventListener('click', function() {
            let d = document.getElementById('flexCheckDefault0')
            let s = document.querySelectorAll('input[type=checkbox]');
            if (d.checked) {
                s.forEach((item) => {
                    item.checked = true;
                })
            } else {
                s.forEach((item) => {
                    item.checked = false;
                })
            }
        })

        function xoa1trang() {
            var ss = document.querySelectorAll('input[type=checkbox]:checked');
            var arr = [];
            for (let i = 1; i < ss.length; i++) {
                arr.push(ss[i].value);
            }
            console.log(arr);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    //console.log(JSON.parse(this.responseText)[0]);
                    if (this.responseText == 'success') {
                        alert('Xóa 1 trang thành công');
                        table_sanpham();
                    } else {
                        alert('xóa thất bại');
                    }
                    console.log(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('deleted1page&data=' + arr);
        }

        function editproduct(id) {
            var s = document.getElementById("imgproduct").src;
            var img = s.split('/');
            var formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                separator: ','
            })
            var s1 = document.getElementById('codez').value;
            var s2 = document.getElementById('namee').value;
            var s3 = document.getElementById('amountt').value;
            var s4 = document.getElementById('prices').value;
            var s5 = document.getElementById('tinhtrang').value;
            var s6 = document.getElementById('theloai').value;
            var s7 = document.getElementById('chatlieu').value;
            var s8 = document.getElementById('xuatxu').value;
            var s9 = document.getElementById('gioithieu').value;
            let row = document.getElementById("sua" + id).parentElement.parentElement;
            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    alert(this.responseText);
                    row.children[1].children[0].src = "../picture/" + img[img.length - 1];
                    row.children[1].children[1].innerText = s2;
                    row.children[2].innerText = s3;
                    row.children[3].innerHTML = formatter.format(s4);
                    row.children[4].children[0].innerText = (s5 == 1 ? 'Còn hàng' : 'Hết hàng');
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=edit' +
                '&inputGroupFile02=' + img[img.length - 1] +
                '&codez=' + s1 +
                "&namee=" + s2 +
                "&amountt=" + s3 +
                "&prices=" + s4 +
                "&tinhtrang=" + s5 +
                "&theloai=" + s6 +
                "&chatlieu=" + s7 +
                "&xuatxu=" + s8 +
                "&gioithieu=" + s9
            );
        }

        //Ajax javascript xóa đối tượng
        let deleteproduct = function(id) {
            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    alert(this.responseText);
                    var del = document.getElementById("xoa" + id);
                    del.parentElement.parentElement.remove();
                    
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=deleted&id=' + id);
        }

        // function phantrang(page) {
        //     var xhttp = new XMLHttpRequest() || ActiveXObject();
        //     xhttp.onreadystatechange = function() {
        //         //Kiem tra neu nhu da gui request thanh cong
        //         if (this.readyState == 4 && this.status == 200) {
        //             // Chèn phản hồi từ máy chủ vào một phần tử HTML
        //             document.getElementById('table_tbody_sanpham').innerHTML = this.responseText;
        //             const nextURL = './quanly_sanpham.php?page=' + page;
        //             const nextTitle = 'My new page title';
        //             const nextState = {
        //                 additionalInformation: 'Updated the URL with JS'
        //             };
        //             //window.history.pushState(nextState, nextTitle, nextURL);
        //             window.history.replaceState(nextState, nextTitle, nextURL);
        //         }
        //     };
        //     xhttp.open('GET', './PHP_Function/sanpham.php?page=' + page, true);
        //     xhttp.send();
        // }

        // function add() {
        //     var xhttp = new XMLHttpRequest() || ActiveXObject();
        //     xhttp.onreadystatechange = function() {
        //         //Kiem tra neu nhu da gui request thanh cong
        //         if (this.readyState == 4 && this.status == 200) {
        //             // Chèn phản hồi từ máy chủ vào một phần tử HTML
        //             document.getElementById('modal-dialog').innerHTML = this.responseText;
        //         }
        //     };
        //     xhttp.open('GET', '../filephp/admin/sanpham/laydanhsach_sanpham.php?action=add', true);
        //     xhttp.send();
        // }

        // function addproduct() {
        //     var s = document.getElementById("inputGroupFile02");
        //     var ss = s.value.replace(/C:\\fakepath\\/, '');
        //     var s1 = document.getElementById('codez').value;
        //     var s2 = document.getElementById('namee').value;
        //     var s3 = document.getElementById('amountt').value;
        //     var s4 = document.getElementById('prices').value;
        //     var s5 = document.getElementById('tinhtrang').value;

        //     //Khoi tao doi tuong
        //     var xhttp = new XMLHttpRequest() || ActiveXObject();
        //     //Bat su kien thay doi trang thai cuar request
        //     xhttp.onreadystatechange = function() {
        //         //Kiem tra neu nhu da gui request thanh cong
        //         if (this.readyState == 4 && this.status == 200) {
        //             //In ra data nhan duoc     
        //             alert(this.responseText);
        //         }
        //     }
        //     //cau hinh request
        //     xhttp.open('POST', '../filephp/admin/sanpham/them_sanpham.php', true);
        //     //cau hinh header cho request
        //     xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     //gui request
        //     xhttp.send('action=add' +
        //         '&inputGroupFile02=' + ss +
        //         '&codez=' + s1 +
        //         "&namee=" + s2 +
        //         "&amountt=" + s3 +
        //         "&prices=" + s4 +
        //         "&tinhtrang=" + s5
        //     );
        // }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>