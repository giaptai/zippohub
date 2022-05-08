<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style></style>

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
                        <a class="nav-link text-light" href="../cuahang.php">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-light" href="#">
                            Giỏ hàng <span class="badge bg-secondary" id="cartcount">
                                <?php session_start();
                                echo isset($_SESSION['cart']) ? count($_SESSION['cart']) :  0;
                                ?></span></a>
                    </li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="../user/canhan.php">Tài khoản</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
                        </li>';
                    } else echo
                    '<li class="nav-item">
                            <a class="nav-link text-light" href="./login_user.php">Đăng nhập</a>
                    </li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
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
                    <a type="button" class="btn btn-outline-primary btn-sm">2</a>
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
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>

                <tbody id="cartt">

                </tbody>

                <tfoot id="cartt2">

                </tfoot>
            </table>
        </div>

        <div id="checkout" style="margin: 1rem auto 2rem auto;" class="d-flex justify-content-end">
            <div class="card" style="width: 18rem;">
                <h5 class="card-title" style="padding: 1rem 0 0 1rem;">Thanh toán</h5>
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <p class="card-text">Tạm tính:</p>
                        <b class="card-text">Tổng:</b>
                    </div>
                    <div id="checkoutttt">
                        <p class="card-text">0</p>
                        <b class="card-text">0</b>
                    </div>
                </div>
                <a class="btn btn-primary" onclick="checkout()">Thanh toán</a>
            </div>
        </div>
        <!-- Chi tiet san pham -->
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
    <script async>
        displaycart();

        function displaycart() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    let dimemay0 = JSON.parse(this.responseText).tbody;
                    let dimemay1 = JSON.parse(this.responseText).tfooter;
                    let dimemay2 = JSON.parse(this.responseText).checkoutOK;
                    let dimemay3 = JSON.parse(this.responseText).cartCount;
                    //In ra data nhan duoc
                    document.getElementById('cartt').innerHTML = dimemay0;
                    document.getElementById('cartt2').innerHTML = dimemay1;
                    document.getElementById('cartcount').innerHTML = dimemay3;
                    // let div = document.createElement('div');
                    // div.innerHTML = div.innerHTML + dimemay2;

                    //console.log(JSON.parse(this.responseText).checkoutOK);
                    if (dimemay2 == '') {
                        document.getElementById('checkout').innerHTML = "";
                    } else {
                        document.getElementById('checkoutttt').innerHTML = dimemay2;
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=listcart');
        }

        function subtract(id) {
            console.log(id.parentNode.querySelector('input[type=number]'));
            console.log(id.value);

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //id.parentNode.querySelector('input[type=number]').stepDown();
                    console.log(this.responseText);
                    displaycart();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('type=giamsoluong&id=' + id.value);
        }

        function add(id) {
            console.log(id.parentNode.querySelector('input[type=number]'));
            console.log(id.value);

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if(this.responseText=='fail'){
                        alert('Quá số lượng trong kho !');
                        return;
                    }
                    displaycart();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('type=tangsoluong&id=' + id.value);
        }

        // document.getElementById('flexCheckDefault0').addEventListener('click', function() {
        //     let d = document.getElementById('flexCheckDefault0')
        //     let s = document.querySelectorAll('input[type=checkbox]');
        //     if (d.checked) {
        //         s.forEach((item) => {
        //             item.checked = true;
        //         })
        //     } else {
        //         s.forEach((item) => {
        //             item.checked = false;
        //         })
        //     }
        // })

        function dele(e) {
            console.log(e);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    displaycart();
                    // document.getElementById('id' + e).parentElement.parentElement.remove();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=dele&id=' + e);
        }

        function deletedAll() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    displaycart();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=deletedall');
        }

        function checkout() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log(this.responseText);
                    if (this.responseText == 'fail') {
                        alert('Bạn cần đăng nhập để thanh toán !');
                    } else {
                        window.location.href = "./checkout.php";
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('checkout');
        }
    </script>

    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>