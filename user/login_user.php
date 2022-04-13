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
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
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
                        <a class="nav-link text-light" href="../cuahang.php">Cửa hàng</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        echo '
                        <li class="nav-item">
                        <a class="nav-link text-light" href="./user/cart.php">
                            Giỏ hàng <span class="badge bg-secondary" id="badge bg-secondary">0</span></a>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="./filephp/user/taikhoan/canhan.php">Tài khoản</a></li>
                                <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                                <li><a class="dropdown-item" href="#">Phản ánh</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                            </ul>
                        </li>';
                    } else echo
                    '<li class="nav-item">
                            <a class="nav-link text-dark bg-light" href="./user/login_user.php">Đăng nhập</a>
                        </li>';
                    ?>
                </ul>
            </div>
            <form class="d-flex">
                <input class="form-control me-3" type="search" placeholder="Search">
                <button class="btn btn-outline-light w-50" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>

    <!-- Dang nhap -->
    <div class="container-fluid w-100 p-0">
        <div class="row d-flex justify-content-center align-items-center mt-3 mb-4">
            <div class="col-md-9 col-lg-6 col-xl-4">
                <img src="./../picture/49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg" class="img" width="300">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-3">
                <form id="formLG">
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fs-3 fw-bold mx-3 mb-0">Đăng nhập</p>
                    </div>
                    <!-- Email input -->
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="emaill" placeholder="name@example.com">
                        <label for="floatingInput">Địa chỉ email</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="passwordd" placeholder="Enter password">
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">Remember me</label>
                        </div>
                        <a href="#!" class="text-body">Quên mật khẩu?</a>
                    </div>
                    <div class="text-center text-lg-start mt-3">
                        <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" id="login">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Chưa có tài khoản? <a href="#!" class="link-danger" onclick="formRG(1)">Đăng kí</a></p>
                    </div>
                </form>

                <form id="formRG" style="display:none">
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fs-3 fw-bold mx-3 mb-0">Đăng kí</p>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="hovaten" placeholder="Nguyen Van A">
                        <label for="floatingInput">Họ và tên</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="sodienthoai" placeholder="09001201">
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="floatingInput">Địa chỉ email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="matkhau" placeholder="Mật khẩu" >
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" >
                        <label for="floatingInput">Địa chỉ</label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" onclick="dangky()">Đăng kí</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Đã có tài khoản? <a href="#!" class="link-danger" onclick="formRG(2)">Đăng nhập</a></p>
                    </div>
                </form>

                <!-- <form id="formFG" style="display:block">
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fs-3 fw-bold mx-3 mb-0">Quên mật khẩu</p>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="hovaten" placeholder="Nguyen Van A">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="sodienthoai" placeholder="09001201">
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="floatingInput">Địa chỉ email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="matkhau" placeholder="Enter password">
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="diachi" placeholder="Enter password">
                        <label for="floatingInput">Địa chỉ</label>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" onclick="dangky()">Đăng kí</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Đã có tài khoản? <a href="#!" class="link-danger" onclick="formRG(2)">Đăng nhập</a></p>
                    </div>
                </form> -->

            </div>
        </div>
    </div>
    <!-- Dang nhap -->

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
        function isEmailValid(email) {
            const emailRegexp = new RegExp(
                /^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/i
            )
            return emailRegexp.test(email)
        }

        function isPasswordValid(str) {
            return /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,16})$/.test(str)
        }

        function isPhonenumberValid(str) {
            return /^[0][0-9]{9}$/.test(str);
        }

        function formRG(e) {
            if (e == 1) {
                document.getElementById("formLG").style.display = "none";
                document.getElementById("formRG").style.display = "block";
            } else {
                document.getElementById("formLG").style.display = "block";
                document.getElementById("formRG").style.display = "none";
            }

        }

        //LOGIN
        document.getElementById('login').addEventListener('click', function() {
            var s1 = document.getElementById('emaill').value;
            var s2 = document.getElementById('passwordd').value;

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (this.responseText == 'success') {
                        alert(this.responseText);
                        window.location.href = '../index.php';
                    } else alert('Không tìm thấy tài khoản, có thể do:\n' +
                        '1. Tài khoản đã bị khóa.\n' +
                        '2. Sai email hoặc mật khẩu.\n' +
                        '3. Tài khoản chưa đăng ký.');
                    //console.log(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/dangnhap_dangki.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request 'data=login'+
            xhttp.send(
                '&email=' + s1 +
                '&pass=' + s2);
        })

        function dangky() {
            hovaten = document.getElementById('hovaten').value;
            sodienthoai = document.getElementById('sodienthoai').value;
            email = document.getElementById('email').value;
            matkhau = document.getElementById('matkhau').value;
            diachi = document.getElementById('diachi').value;
            console.log(hovaten, sodienthoai, email, matkhau, diachi);

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (this.responseText == 'success') {
                        alert(this.responseText);
                        document.getElementById("formLG").style.display = "block";
                        document.getElementById("formRG").style.display = "none";
                    } else alert(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/dangnhap_dangki.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request 'data=login'+
            xhttp.send('dangky' +
                '&hovaten=' + hovaten +
                '&sodienthoai=' + sodienthoai +
                '&email=' + email +
                '&matkhau=' + matkhau +
                '&diachi=' + diachi);

        }
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>