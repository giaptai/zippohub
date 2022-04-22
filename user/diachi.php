<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .card:hover {
        border: 1px ridge;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../user/cart.php">
                            Giỏ hàng <span class="badge bg-secondary">
                                <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) :  0; ?></span>
                        </a>
                    </li>
                    <?php

                    if (isset($_SESSION['email'])) {
                        echo
                        '</span></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="./user/canhan.php">Tài khoản</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" onclick="logout()">Đăng xuất</a></li>
                            </ul>
                        </li>';
                    } else echo
                    '<li class="nav-item">
                            <a class="nav-link text-light" href="./user/login_user.php">Đăng nhập</a>
                        </li>';
                    ?>
                </ul>
            </div>
            <form class="d-flex">
                <input class="form-control me-3" type="search" placeholder="Tên sản phẩm" id="search">
                <button class="btn btn-outline-light w-50" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>

    <?php echo $_SESSION['iduser'] ?>

    <div class="container mt-4 mb-4">
        <div class="row justify-content-around">
            <div class="col-md-2 p-0 mb-4">
                <div id="menu" class="list-group" style="width:100%;">
                    <h5>Nguyễn Tiến</h5>
                    <a type="button" class="list-group-item list-group-item-action" href="./canhan.php?id=<?= $_SESSION['iduser'] ?>">Thông tin cá nhân</a>
                    <a type="button" class="list-group-item list-group-item-action active">Địa chỉ</a>
                    <a type="button" class="list-group-item list-group-item-action" href="./lichsudonhang.php?lichsu&id=<?= $_SESSION['iduser'] ?>">Lịch sử đơn hàng</a>
                    <a type="button" class="list-group-item list-group-item-action" href="./makhuyenmai.php?makhuyenmai&id=<?= $_SESSION['iduser'] ?>">Mã khuyến mãi</a>
                    <button type="button" class="list-group-item list-group-item-action list-group-item-danger">Đăng xuất</button>
                </div>
            </div>
            <div class="col-md-9 p-0">
                <div id="manhinh">
                    <div class="ttcanhan" style="padding:0 2rem;">
                        <div style="text-align: center;border: dotted;">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Thêm địa chỉ
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Địa chỉ mới</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formAddr">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control" id="dc_hoten" placeholder="Nguyen Van A">
                                                    <label for="floatingInput">Họ và tên</label>
                                                </div>
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control" id="dc_sdt" placeholder="09001201">
                                                    <label for="floatingInput">Số điện thoại</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="dc_diachi" placeholder="Enter password">
                                                    <label for="floatingInput">Địa chỉ</label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="addAr(<?php echo $_SESSION['iduser'] ?>)">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div id="addruser">
                            <?php
                            require_once('../query.php');
                            if (isset($_GET['diachi'])) {
                                $s = '';
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM diachikhach where id_user={$id}";
                                $result = executeResult($sql);
                                foreach ($result as $arr) {
                                    $s .= '<div class="item mt-3" style="border: 1px ridge">
                                    <div class="d-flex justify-content-between p-2">
                                        <div class="info">
                                            <div class="name">' . $arr['name'] . '</div>
                                            <div class="address"><span>Địa chỉ: </span>' . $arr['addr'] . '</div>
                                            <div class="phone"><span>Điện thoại: </span>' . $arr['phone'] . '</div>
                                        </div>
                                        <div><a class="text-primary text-decoration-none fs-6" href="./sua_diachi.php?id_addr=' . $arr['id_addr'] . '">Chỉnh sửa</a>
                                            <a class="btn text-danger btn-sm fs-6" onclick="xoaDiaChi(this, ' . $arr['id_addr'] . ')">X</a>
                                        </div>
                                    </div>
                                </div>';
                                }
                                echo $s;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->
            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script>
        function xoaDiaChi(p, idddr) {
            let cf = confirm('xóa địa chỉ này ?');
            console.log(cf);
            if (cf == true) {
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        alert(this.responseText);
                        let element = p.parentNode.parentNode.parentNode
                        element.remove()
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/xoa_dia_chi.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('id_address=' + idddr);
            } else return;
        }

        function addAr(id) {
            let s0 = Math.floor(Math.random() * 10001) + 1000;
            let s1 = document.getElementById('dc_hoten').value;
            let s2 = document.getElementById('dc_sdt').value;
            let s3 = document.getElementById('dc_diachi').value;

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (this.responseText == 'fail') {
                        alert('Thêm địa chỉ lỗi, có thể do:\n' +
                            '1. Trùng số điện thoại.\n' +
                            '2. Tên người nhận lỗi');
                    } else if (this.responseText == 'fail1') {
                        alert('Mỗi tài khoản tối đa 5 địa chỉ');
                    } else {
                        alert(this.responseText);
                        node = document.createElement("div");
                        node.className = "item mt-3";
                        node.style.cssText = "border: 1px ridge";
                        node.innerHTML = '<div class="d-flex justify-content-between p-2">' +
                            '<div class="info">' +
                            '<div class="name">' + s1 + '</div>' +
                            '<div class="address"><span>Địa chỉ: </span>' + s3 + '</div>' +
                            '<div class="phone"><span>Điện thoại: </span>' + s2 + '</div>' +
                            '</div>' +
                            '<div>' +
                            '<a class="text-primary text-decoration-none fs-6" href="./sua_diachi.php?id_addr=' + s0 + '">Chỉnh sửa </a>' +
                            '<a class="btn text-danger btn-sm fs-6" onclick="xoaDiaChi(this, ' + s0 + ')">X</a>' +
                            '</div>' +
                            '</div>'
                        document.getElementById("addruser").append(node);
                    }

                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/them_diachi.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('id_user=' + id + '&id_addr=' + s0 + '&name=' + s1 + '&phone=' + s2 + '&addr=' + s3);
        }
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>