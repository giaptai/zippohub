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
            <a class="nav-link active" aria-current="page" href="quanly_makhuyenmai.php">Quản lý mã khuyến mãi</a>
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
        <div class="modal-dialog" id="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <form class="form-floating" enctype="multipart/form-data" method="POST">
                        <!-- Name input -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mã khuyến mãi:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Mã khuyến mãi" id="khuyenmai">
                                <button class="btn btn-outline-secondary" type="button" onclick="console.log(this.parentNode.querySelector('input[type=text]').value=(Math.random() +1).toString(36).substring(2))">Tạo mã</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Trạng thái:</label>
                            <select class="form-select" id="trangthai">
                                <option value="1">Còn hạn</option>
                                <option value="0">Hết hạn</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ngày hết hạn:</label>
                            <input type="text" class="form-control" placeholder="Ngày hết hạn" id="ngayhethan">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Giảm giá:</label>
                            <input type="number" class="form-control" placeholder="Giá giảm" id="giagiam">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Thêm</button>
                </div>
            </div>
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
                        <span class="input-group-text" id="basic-addon1">Mã khuyến mãi</span>
                        <input type="text" class="form-control" placeholder="Mã khuyến mãi" id="button-addon1">
                    </div>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="search()">Tìm kiếm</button>
                </div>
            </div>
        </div>

        <?php require_once("../query.php");
            $page=isset($_GET['page']) ? $_GET['page']:1;
            $start=($page-1)*10;
            $codelist = executeResult("select * from makhuyenmai limit $start, 10");
            $count = countRow("select * from makhuyenmai");
        ?>
        <table class="table align-middle caption-top">
            <caption>
                Quản lý mã khuyến mãi
                <a type="button" class="btn btn-success btn-sm" href="./quanly_makhuyenmai_them.php">Thêm mã khuyến mãi</a>
                <div type="button" class="btn btn-outline-primary btn-sm m-2">
                    Tổng mã <span class="badge bg-danger" id="badge"><?= $count ?></span>
                </div>
            </caption>
            <thead>
                <tr>
                    <th scope="col" class="w-auto">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault0">
                        <label>STT</label>
                    </th>
                    <th scope="col">Mã khuyến mãi</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Giảm giá</th>
                    <th scope="col">Ngày hết hạn</th>
                    <th scope="col" style="width:9rem">Thao tác</th>
                </tr>
            </thead>
            <tbody id="table_tbody_makhuyenmai">
                <?php
                foreach ($codelist as $code) {
                    echo '<tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="' . $code["id_khuyenmai"] . '">
                            <span>' . ++$start . '</span>
                        </div>
                    </th>
                    <td>
                        <span>' . $code["id_khuyenmai"] . '</span>
                    </td>
                    <td>' . ($code["trangthai"] == 1 ? 'Còn hạn' : 'Hết hạn') . '</td>
                    <td>' . number_format($code["giamgia"]) . '</td>
                    <td>' . $code["ngayhethan"] . '</td>
                    <td>
                        <button type="button" id="btn' . $code["id_khuyenmai"] . '" value="' . $code["id_khuyenmai"] . '" class="btn btn-outline-primary btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
                        <button class="btn btn-danger btn-sm" name="xoa"  onclick="deleteproduct(866)">X</button>
                    </td>
                </tr>';
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" style="text-align:center">
                        <div class="align-items-center btn-group btn-group-sm" role="group" aria-label="First group" id="table_tfoot_makhuyenmai">
                            <?php
                            for ($i = 0; $i < ceil($count / 10); $i++) {
                                echo  '<button type="button" class="btn btn-outline-secondary" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</button>';
                            }
                            ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!--  -->
    <script>
        function search() {
            s1 = document.getElementById('button-addon1').value;
            console.log(s1);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log(this.responseText)
                    document.getElementById('table_tbody_makhuyenmai').innerHTML = this.responseText;

                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/makhuyenmai.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('search&val=' + s1);
        }

        function phantrang(page) {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    // Chèn phản hồi từ máy chủ vào một phần tử HTML
                    document.getElementById('flexCheckDefault0').checked = false;
                    document.getElementById('table_tbody_makhuyenmai').innerHTML = this.responseText;
                    const nextURL = './quanly_makhuyenmai.php?page=' + page;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    //window.history.pushState(nextState, nextTitle, nextURL);
                    window.history.replaceState(nextState, nextTitle, nextURL);

                }
            };
            xhttp.open('GET', './PHP_Function/makhuyenmai.php?page=' + page, true);
            xhttp.send();
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
            xhttp.open('GET', './PHP_Function/makhuyenmai.php?id=' + e, true);
            xhttp.send();
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
                    console.log(this.responseText);
                    table_sanpham();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('deleted1page&data=' + arr);
        }

        function editpromo(p) {
            var khuyenmai = document.getElementById("khuyenmai").value;
            var trangthai = document.getElementById("trangthai").value;
            var ngayhethan = document.getElementById("ngayhethan").value;
            var giamgia = document.getElementById("giamgia").value;
            var s = document.getElementById('btn' + p).parentNode.parentNode;
            console.log(s.children[2], s.children[3], s.children[4]);

            var formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                separator: ','
            })

            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc     
                    alert(this.responseText);
                    s.children[2].innerText = trangthai
                    s.children[3].innerText = formatter.format(giamgia);
                    s.children[4].innerText = ngayhethan
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/makhuyenmai.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('edit' +
                '&khuyenmai=' + khuyenmai +
                '&trangthai=' + trangthai +
                "&ngayhethan=" + ngayhethan +
                "&giamgia=" + giamgia
            );
        }

        let deleteproduct = function(id) {
            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    var del = document.getElementById("xoa" + id);
                    del.parentElement.parentElement.remove();
                    //In ra data nhan duoc
                    alert(this.responseText);
                    table_sanpham(); // load lai san pham va nut phan trang
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/makhuyenmai.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('deleted&id=' + id);
        }

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