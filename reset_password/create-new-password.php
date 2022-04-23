<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <a class="nav-link text-light" aria-current="page" href="../index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../cuahang.php">Cửa hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-sm mt-5 mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h3>Nhập mật khẩu mới</h3>
                <?php if (isset($_GET["error"])) {
                    $val = $_GET["error"];
                    switch ($val) {
                        case "emptyfields":
                            echo '<div class="align-items-center my-2">
                                    <p class="text-danger fw-bold mb-0">
                                        <small>Không được để trống</small>
                                    </p>
                                </div>';
                            break;

                        case "notmatch":
                            echo '<div class="align-items-center my-2">
                                    <p class="text-danger fw-bold mb-0">
                                        <small>Mật khẩu không khớp</small>
                                    </p>
                                </div>';
                            break;

                        default:
                            echo '<div class="align-items-center my-2">
                                    <p class="text-danger fw-bold mb-0">
                                        <small>Lỗi </small>
                                    </p>
                                </div>';
                            break;
                    }
                } ?>
                <!-- <div class="align-items-center my-2">
                    <p class="text-danger fw-bold mb-0" id="thongbao">
                        <small>Không tìm thấy tài khoản, có thể do:<br>
                            1. Chưa nhập thông tin.<br>
                            2. Sai email hoặc mật khẩu.<br>
                            3. Tài khoản chưa đăng ký.<br>
                        </small>
                    </p>
                </div> -->
                <?php $selector = $_GET["selector"];
                $validator = $_GET["validator"];
                if (empty($selector) || empty($validator)) {
                    echo "Could not validate your request!";
                } else {
                    if (ctype_xdigit($selector) == true && ctype_xdigit($validator) == true) { ?>

                        <form action="reset-password-handler.php" method="post">
                            <input hidden name="selector" type="text" value="<?php echo $selector ?>">
                            <input hidden name="validator" type="text" value="<?php echo    $validator ?>">

                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Mật khẩu mới</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="retype_password" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Nhập lại mật khẩu mới</label>
                            </div>

                            <button class="btn btn-primary btn-lg" name="reset-password-submit">Reset mật khẩu</button>
                        </form>
                <?php
                    }
                } ?>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>