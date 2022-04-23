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
                    <a type="button" class="list-group-item list-group-item-action " href="./diachi.php?diachi&id=<?= $_SESSION['iduser'] ?>">Địa chỉ</a>
                    <a type="button" class="list-group-item list-group-item-action" href="./lichsudonhang.php?lichsu&id=<?= $_SESSION['iduser'] ?>">Lịch sử đơn hàng</a>
                    <a type="button" class="list-group-item list-group-item-action active">Mã khuyến mãi</a>
                    <button type="button" class="list-group-item list-group-item-action list-group-item-danger">Đăng xuất</button>
                </div>
            </div>
            <div class="col-md-9 p-0">
                <div id="manhinh">
                    <div style="padding:0 1rem 1rem 1rem;" id="lichsudonhang">
                        <div class="input-group w-50" style="float: right;">
                            <input type="search" placeholder="Tìm mã" class="form-control" onchange="timma(this.parentElement.children[0].value)">
                            <button class="input-group-text">Tìm mã</button>
                        </div>
                        <table class="table table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã khuyến mãi</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Ngày hết hạn</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="orderlist">
                                <?php require_once('../query.php');
                                if (isset($_GET['makhuyenmai'])) {
                                    $id_user = $_SESSION['iduser'];
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($page - 1) * 10;
                                    $sql = "SELECT * from makhuyenmai where id_user='$id_user' LIMIT $start, 10";
                                    $s = array('arr1' => '', 'arr2' => '');
                                    //die($sql);
                                    $result = executeResult($sql);
                                    $resul1t = countRow("SELECT * from makhuyenmai where id_user='$id_user'");
                                    if ($resul1t > 0) {
                                        $count = 1;
                                        foreach ($result as $row) {
                                            $s['arr1'] .= '<tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="' . $row["id_khuyenmai"] . '">
                                                    <span>' . $count++ . '</span>
                                                </div>
                                            </th>
                                            <td>
                                                <span>' . $row["id_khuyenmai"] . '</span>
                                            </td>
                                            <td>' . number_format($row["giamgia"]) . '</td>
                                            <td>' . $row["ngayhethan"] . '</td>
                                            <td>  
                                                <button type="button" id="btn' . $row["id_khuyenmai"] . '" value="' . $row["id_khuyenmai"] . '" class="btn btn-outline-info btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
                                            </td>
                                        </tr>';
                                        }
                                    } else {
                                        $s['arr1'] = '<td colspan="5">Không tìm thấy</td>  ';
                                    };
                                    echo ($s['arr1']);
                                }
                                ?>
                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-center" id="phantrang">
                                <?php
                                for ($i = 0; $i < ceil($resul1t / 10); $i++) {
                                    if ($i == $page - 1) {
                                        $s['arr2'] .= '<li class="page-item active"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
                                    } else $s['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
                                }
                                echo $s['arr2'];
                                ?>
                            </ul>
                        </nav>
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
        function timma(val) {
            console.log(val);
            if (val == '') {
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
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        console.log(this.responseText);
                        let ds = JSON.parse(this.responseText).arr1;
                        let ptr = JSON.parse(this.responseText).arr2;
                        document.getElementById('orderlist').innerHTML = ds;
                        document.getElementById('phantrang').innerHTML = ptr;

                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/display_makhuyenmai.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=search&val=' + val);
            }
        }

        function phantrang(p, id) {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log(this.responseText);
                    const nextURL = './makhuyenmai.php?makhuyenmai&id=' + id + '&page=' + p;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    //window.history.pushState(nextState, nextTitle, nextURL);
                    window.history.replaceState(nextState, nextTitle, nextURL);
                    console.log(this.responseText);
                    let ds = JSON.parse(this.responseText).arr1;
                    let ptr = JSON.parse(this.responseText).arr2;
                    document.getElementById('orderlist').innerHTML = ds;
                    document.getElementById('phantrang').innerHTML = ptr;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_makhuyenmai.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=phantrang&page=' + p);
        }
       
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>