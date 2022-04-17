<!DOCTYPE html>
<html lang="en">

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
        /* transform: scale(1.1) */
    }

    /* .card {
        transition: 0.5s ease-in-out;
        margin: 0 1rem 0 0;
    } */
</style>

<body style="background-color: #f2f2f2;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-light" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./cuahang.php">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./user/cart.php">
                            Giỏ hàng <span class="badge bg-secondary">
                                <?php session_start();
                                echo  isset($_SESSION['cart']) ? count($_SESSION['cart']) :  0; ?></span>
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
                                <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                                <li><a class="dropdown-item" href="#">Phản ánh</a></li>
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

    <div class="container" s>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./picture/zippovn.net-banner-3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./picture/zippovn.net-banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./picture/zippovn.net-banner.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn btn-secondary"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="btn btn-secondary carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row " style="text-align: center; margin:2rem auto 1rem auto;">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="card h-100">
                        <div class="card-footer">
                            <small class="text-muted">30.000 VNĐ VẬN CHUYỂN<br>
                                Giao hàng toàn quốc</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">

                        <div class="card-footer">
                            <small class="text-muted">BẢO HÀNH 1 THÁNG<br>
                                Hỗ trợ bảo trì Zippo</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-footer">
                            <small class="text-muted">TƯ VẤN <br>
                                Hotline : 090 949 1932</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">

        <div class="row row-md-2 justify-content-between " style="margin:2rem auto 1rem auto;">
            <div class="col-12 mb-3 ">
                <div class="d-flex slider-header justify-content-between bg-primary align-items-center" style="height: 3rem;">
                    <h4 class="slider-title fw-bolder text-white ps-2 m-0">
                        Zippo Armor
                    </h4>
                    <div class="sub-links pe-2">
                        <form action="./cuahang.php" method="post">
                            <button name="xemthem" value="Zippo Armor" class="btn btn-light btn-sm text-dark">Xem thêm</button>
                        </form>
                    </div>
                </div>

                <!-- <div class="row row-cols-1 row-cols-md-6">
                    <div class="col">
                        <div class="card h-100">
                            <img style="width:8rem; height:9rem;" src="./picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">1,500 VNĐ</p>
                                <a class="btn btn-sm btn-outline-primary" id="id1172" onclick="buyproduct(1172)">Mua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img style="width:8rem; height:9rem;" src="./picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                            </div>
                            <div class="card-footer">
                                <p class="card-text">1,500 VNĐ</p>
                                <a class="btn btn-sm btn-outline-primary" id="id1172" onclick="buyproduct(1172)">Mua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img style="width:8rem; height:9rem;" src="./picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                            </div>
                            <div class="card-footer">
                                <p class="card-text">1,500 VNĐ</p>
                                <a class="btn btn-sm btn-outline-primary" id="id1172" onclick="buyproduct(1172)">Mua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img style="width:8rem; height:9rem;" src="./picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                            </div>
                            <div class="card-footer">
                                <p class="card-text">1,500 VNĐ</p>
                                <a class="btn btn-sm btn-outline-primary" id="id1172" onclick="buyproduct(1172)">Mua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img style="width:8rem; height:9rem;" src="./picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                            </div>
                            <div class="card-footer">
                                <p class="card-text">1,500 VNĐ</p>
                                <a class="btn btn-sm btn-outline-primary" id="id1172" onclick="buyproduct(1172)">Mua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img style="width:8rem; height:9rem;" src="./picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>

                            </div>
                            <div class="card-footer">
                                <p class="card-text">1,500 VNĐ</p>
                                <a class="btn btn-sm btn-outline-primary" id="id1172" onclick="buyproduct(1172)">Mua</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row row-cols-md-6 gx-0" id="zippoarmor">
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="d-flex slider-header justify-content-between bg-primary align-items-center" style="height: 3rem;">
                    <h4 class="slider-title fw-bolder text-white ps-2 m-0">
                        Zippo Sterling Silver
                    </h4>
                    <div class="sub-links pe-2">
                        <form action="./cuahang.php" method="post">
                            <button name="xemthem" value="Zippo Sterling Silver" class="btn btn-light btn-sm text-dark">Xem thêm</button>
                        </form>
                    </div>
                </div>
                <div class="row row-cols-md-6 gx-0" id="zipposterlingsilver">
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="d-flex slider-header justify-content-between bg-primary align-items-center" style="height: 3rem;">
                    <h4 class="slider-title fw-bolder text-white ps-2 m-0">
                        Zippo Base Models
                    </h4>
                    <div class="sub-links pe-2">
                        <form action="./cuahang.php" method="post">
                            <button name="xemthem" value="Zippo Base Models" class="btn btn-light btn-sm text-dark">Xem thêm</button>
                        </form>
                    </div>
                </div>
                <div class="row row-cols-md-6 gx-0" id="zippobasemodels">

                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="container marketing bg-light" style="margin:2rem auto 1rem auto;text-align:center">
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-3 p-3">
                    <img class="bd-placeholder-img rounded-circle" src="./picture/tai.jpg" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <h2>Nguyễn Vĩnh Tiến</h2>
                    <p>111111</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>
                <div class="col-lg-3 p-3">
                    <img class="bd-placeholder-img rounded-circle" src="./picture/tai.jpg" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

                    <h2>Nguyễn Giáp Tài</h2>
                    <p>11111</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>
                <div class="col-lg-3 p-3">
                    <img class="bd-placeholder-img rounded-circle" src="./picture/tri.jpg" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <h2>Bùi Trí</h2>
                    <p>111111.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>
                <div class="col-lg-3 p-3">
                    <img class="bd-placeholder-img rounded-circle" src="./picture/tai.jpg" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <h2>Lê Ngọc Toàn</h2>
                    <p>111111</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
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
        display();

        function display() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    let s1 = JSON.parse(this.responseText).arr1;
                    let s2 = JSON.parse(this.responseText).arr2;
                    let s3 = JSON.parse(this.responseText).arr3;
                    document.getElementById('zippoarmor').innerHTML = s1;
                    document.getElementById('zipposterlingsilver').innerHTML = s2;
                    document.getElementById('zippobasemodels').innerHTML = s3;
                }
            }
            //cau hinh request
            xhttp.open('POST', './user/PHP_Function/display_trangchu.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=displaysanpham');
        }

        function logout() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    window.location.href = "./user/login_user.php";
                }
            }
            //cau hinh request
            xhttp.open('POST', './user/PHP_Function/dangnhap_dangki.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('logout');
        }

        function buyproduct(e) {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (this.responseText != '') {
                        alert(this.responseText)
                    } else {
                        let btn = document.getElementById("id" + e)
                        btn.innerText = "Đã thêm vào giỏ"
                        btn.classList.add('disabled')
                        btn.classList.add('btn-primary')
                        btn.classList.remove('btn-outline-primary')
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './user/PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('data=' + e + '&mua');
        }
        let morebtn = document.querySelectorAll(".see-more")
        morebtn.forEach((e) => {
            e.addEventListener('click', () => {
                console.log(e)
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc 
                    }
                }
                //cau hinh request
                xhttp.open('POST', './user/PHP_Function/display_cuahang.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=xemthem&data=' + e.previousElementSibling.innerText);
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>