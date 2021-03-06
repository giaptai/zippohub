<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: #f2f2f2;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-light" aria-current="page" href="../index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../cuahang.php">Cửa hàng</a>
                    </li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '
                        <li class="nav-item">
                        <a class="nav-link text-light" href="../user/cart.php">
                            Giỏ hàng <span class="badge bg-secondary" id="badge bg-secondary">0</span></a>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="../user/canhan.php">Tài khoản</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" onclick="logout()">Đăng xuất</a></li>
                            </ul>
                        </li>';
                    } else echo
                    '<li class="nav-item">
                            <a class="nav-link text-light" href="./login_user.php">Đăng nhập</a>
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
    <?php
    require_once('../query.php');
    if (isset($_GET['id'])) {
        $result = executeSingleResult("SELECT * FROM sanpham WHERE id='{$_GET['id']}'");
    }
    ?>

    <!-- Chi tiet san pham -->
    <div class="container">
        <h1 style="text-align: center; color: red; font-style: italic;" class="pt-4">Chi tiết sản phẩm</h1>
        <div class="row mb-5 bg-white">
            <div class="col-lg-auto mb-5 mt-3 m-auto">
                <div class="text-center mb-3 border"> <img id="main-image" src="../picture/<?= $result['img'] ?>" width="320"> </div>
                <div class="thumbnail text-center pt-2">
                    <!-- <img class="border" onclick="change_image(this)" src="../picture/49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg" width="100">
                    <img class="border" onclick="change_image(this)" src="../picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" width="100">
                    <img class="border" onclick="change_image(this)" src="../picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" width="100"> -->
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="product p-1">
                    <div class="mb-2">
                        <h2 class="fw-bolder"><?= $result['name'] ?></h2>
                        <h4 class="text-danger fw-bolder"><?= number_format($result['price']) ?> VND</h4>
                        <p class="mb-2">Mã sản phẩm: <span class="fw-bold"><?= $result['id'] ?><span></p>
                        <ul class="">
                            <li>
                                <p class="m-0">Tình trạng: <span class="fw-bold"><?= $result['state'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></span></p>
                            </li>
                            <li>
                                <p class="m-0">Thương hiệu: <span class="fw-bold"><?= $result['category'] ?></span></p>
                            </li>
                            <li>
                                <p class="m-0">Chất liệu: <span class="fw-bold"><?= $result['material'] ?></span></p>
                            </li>
                            <li>
                                <p class="m-0">Xuất xứ: <span class="fw-bold"><?= $result['madeby'] ?></span></p>
                            </li>
                        </ul>
                    </div>
                    <hr class="bg-dark border-dark">
                    <div class="">
                        <h5 class="fw-bolder">GIỚI THIỆU: </h5>
                        <span class="fs-6"><?= $result['intro'] ?></span>
                    </div>
                    <hr class="bg-dark border-dark">
                    <!-- <div class="col-12"> -->
                        <?php
                        if (!isset($_SESSION["cart"][$result['id']])) {
                            echo '<button class="btn btn-primary btn-lg w-100" onclick="buyproduct(' . $result['id'] . ')" id="id' . $result['id'] . '">Mua sản phẩm</button>';
                        } else {
                            echo '<button class="btn btn-primary btn-lg disabled w-100" onclick="buyproduct(' . $result['id'] . ')" id="id' . $result['id'] . '">Đã thêm vào giỏ</button>';
                        }
                        ?>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Chi tiet san pham -->

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
        function change_image(image) {
            var container = document.getElementById("main-image");
            container.src = image.src;
        }

        function buyproduct(e) {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    let s1=JSON.parse(this.responseText).arr1;
                    if (s1== 'success') {
                        let btn = document.getElementById("id" + e)
                        btn.innerText = "Đã thêm vào giỏ"
                        btn.classList.add('disabled')
                        btn.classList.add('btn-primary')
                        btn.classList.remove('btn-outline-primary')
                        
                    } else {
                        alert("Mỗi tài khoản chỉ mua tối đa 5 sản phẩm !")
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('data=' + e + '&mua');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>