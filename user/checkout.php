<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="../../../index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../../index.php">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            Giỏ hàng <span class="badge bg-secondary">4</span>
                        </a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="../taikhoan/canhan.php">Tài khoản</a></li>
                                <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                                <li><a class="dropdown-item" href="#">Phản ánh</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
                        </li>';
                    } else echo
                    '<li class="nav-item">
                            <a class="nav-link text-light" href="./user/login_resgin/login.php">Đăng nhập</a>
                        </li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- step -->
    <div class="step-container row justify-content-md-center align-items-center mt-4">
        <div class="col-md-auto">
            <div class="text-center">
                <a type="button" class="btn btn-outline-primary btn-sm active">1</a>
                <p><strong>Giỏ hàng</strong></p>
            </div>
        </div>

        <hr class="bg-primary col-2 rounded-pill" size="10">

        <div class="col-md-auto">
            <div class="text-center">
                <a type="button" class="btn btn-outline-primary btn-sm active">2</a>
                <p><strong>Kiểm tra thông tin</strong></p>
            </div>
        </div>

        <hr class="bg-primary col-2 rounded-pill" size="10">

        <div class="col-md-auto">
            <div class="text-center">
                <a type="button" class="btn btn-outline-primary btn-sm">3</a>
                <p><strong>Thanh toán</strong></p>
            </div>
        </div>

        <hr class="bg-primary col-2 rounded-pill" size="10">

        <div class="col-md-auto">
            <div class="text-center">
                <a type="button" class="btn btn-outline-primary btn-sm">4</a>
                <p><strong>Hoàn thành</strong>
            </div>
            </p>
        </div>
    </div>
    <!-- step -->
    <!-- Chi tiet san pham -->
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Thông tin hóa đơn</h2>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3" id="numberProd">
                        <span class="text-primary">Thanh toán</span>
                        <span class="badge bg-primary rounded-pill">5</span>
                    </h4>
                    <ul class="list-group mb-3" id="listcart">
                        <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">Third item</h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng tiền:</span>
                            <strong>1.000.000</strong>
                        </li> -->
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code" id="promocode">
                            <button type="button" class="btn btn-secondary" onclick="vouchers()">Áp dụng</button>
                        </div>
                    </form>
                    <!-- <div style="width: 90%; margin: 1rem auto 2rem auto;" class="d-flex justify-content-end"> -->
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between">
                            <div>
                                <h6 class="card-text">Tạm tính:</h6>
                                <h6 class="card-text">Vận chuyển:</h6>
                                <h6 class="card-text">Khuyến mãi:</h6>
                                <h6 class="card-text">Tổng thanh toán:</h6>
                            </div>
                            <div id="checkoutcard">
                                <h6 class="card-text">1</h6>
                                <h6 class="card-text">1</h6>
                                <h6 class="card-text">1</h6>
                                <h6 class="card-text">1</h6>
                            </div>
                        </div>
                        <a class="btn btn-primary" onclick="payment()">Thanh toán</a>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3 text-primary">Thông tin người nhận</h4>
                    <form class="needs-validation" novalidate="" id="axxxc">

                    </form>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="list-group" id="listaddr">
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                </div>
            </div>
            <footer class="my-5 pt-5 text-muted text-center text-small">

            </footer>
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

    <script>
        checkout1();

        function checkout1() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    document.getElementById("axxxc").innerHTML = this.responseText;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_checkout.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=display_info');
        }

        listaddress();

        function listaddress() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    document.getElementById("listaddr").innerHTML = this.responseText;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_checkout.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=listaddr');
        }

        function addrInput() {
            let s = document.getElementById('address').value;
            console.log(s);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    document.getElementById("listaddr").innerHTML = this.responseText;
                }
            }
            //cau hinh request
            xhttp.open('GET', './PHP_Function/display_checkout.php?data=' + s, true);
            //gui request
            xhttp.send();
        }

        function clickaddr(e) {
            let s1 = document.getElementById('addr' + e).children[0].children[0].textContent;
            let s2 = document.getElementById('addr' + e).children[1].textContent;
            let s3 = document.getElementById('addr' + e).children[2].textContent;
            console.log(s1, s2, s3);
            document.getElementById('fullname').value = s1;
            document.getElementById('phonee').value = s2;
            document.getElementById('address').value = s3;
        }

        displaycart();

        function displaycart() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    //document.getElementById("listcart").innerHTML = this.responseText;
                    let s11 = JSON.parse(this.responseText).lstcart;
                    let s12 = JSON.parse(this.responseText).checkoutbox;
                    let s13 = JSON.parse(this.responseText).tongg;

                    console.log(s13);

                    document.getElementById("listcart").innerHTML = s11;
                    document.getElementById("checkoutcard").innerHTML = s12;
                    document.getElementById("numberProd").innerHTML = s13;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_checkout.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('promocode');
        }

        function vouchers() {
            var s = document.getElementById('promocode').value;
            var s1 = document.getElementById('promocode').parentElement.children[1];
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    let s12 = JSON.parse(this.responseText).checkoutbox;
                    document.getElementById("checkoutcard").innerHTML = s12;
                    s1.outerHTML = '<button type="button" class="btn btn-success" onclick="vouchers()">Đã áp dụng</button>';
                    console.log(JSON.parse(this.responseText).checkoutbox);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_checkout.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('promocode=' + s);
        }

        function payment() {
            s1 = document.getElementById('fullname').value;
            s2 = document.getElementById('phonee').value;
            s3 = document.getElementById('address').value;
            s4 = document.getElementById('promocode').value;
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    // console.log(JSON.parse(this.responseText));
                    window.location.href = "billing.php"
                }
            }
            //cau hinh request
            xhttp.open('GET', './PHP_Function/display_checkout.php?action=payment&magiamgia=' + s4 + '&name=' + s1 + '&phone=' + s2 + '&address=' + s3, true);
            //gui request
            xhttp.send();
        }
    </script>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>