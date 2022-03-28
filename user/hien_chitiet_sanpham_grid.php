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
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../user/cart.php">Giỏ hàng</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                            <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Phản ánh</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Chi tiet san pham -->
    <h3 style="text-align: center; color: pink; font-style: italic;" class="pt-3">Chi tiết sản phẩm</h3>
    <!-- <div class="container pt-3 mb-4">
        <div class="row d-flex justify-content-center">
            <div class="card flex-row w-75 p-0">
                <div class="col-md-6">
                    <div class="images">
                        <div class="text-center p-3"> <img id="main-image" src="../picture/49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg" width="250" /> </div>
                        <div class="thumbnail text-center">
                            <img onclick="change_image(this)" src="../picture/49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg" width="70">
                            <img onclick="change_image(this)" src="../picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" width="70">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product p-4">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center"> <span class="">Quay lại</span> </div>
                        </div>
                        <div class="mt-4 mb-3"> <span class="text-muted brand">SẢN PHẨM</span>
                            <h5 class="mb-3">Zippi Shipoo</h5>
                            <div class="price d-flex flex-column ">
                                <span class="act-price text-decoration-line-through">1.000.000 VND </span>
                                <small class="text-danger">10% OFF</small>
                            </div>
                            <span>990.000 VND</span>
                        </div>
                        <div class="mb-5"> <span class="text-uppercase text-muted brand">Giới thiệu:</span>
                            <p class="about">Đây là sản phẩm dành cho Mu rác rưởi.</p>
                        </div>
                        <div class="cart mt-4 align-items-center"><button class="btn btn-primary mr-2 px-4">MUA HÀNG</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Chi tiet san pham -->

    <!-- Chi tiet san pham 2 -->
    <div class="mb-3 d-flex w-75 m-auto">
        <div class="col-md-6">
            <div class="images">
                <div class="text-center p-1"> <img id="main-image" src="../picture/49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg" width="250" /> </div>
                <div class="thumbnail text-center">
                    <img onclick="change_image(this)" src="../picture/49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg" width="70">
                    <img onclick="change_image(this)" src="../picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" width="70">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product p-1">
                <div class="mt-2 mb-3">
                    <h4 class="text-muted brand">SẢN PHẨM</h4>
                    <h5 class="mb-99">Zippi Shipoo</h5>
                    <div class="price d-flex">
                        <h5 class="act-price text-decoration-line-through">1.000.000 VND </h5>
                        <h6 class="text-danger">10% OFF</h6>
                    </div>
                    <h5>990.000 VND</h5>
                </div>
                <div class="mb-5">
                    <h5 class="text-uppercase text-muted brand">Giới thiệu:</h5>
                    <h6 class="about">Đây là sản phẩm dành cho Mu rác rưởi. Bọn wibu không có quyền công dân
                    </h6>
                </div>
                <div class="">
                    <button class="btn btn-primary">Mua sản phẩm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Chi tiet san pham 2 -->

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
        document.addEventListener("DOMContentLoaded", function(event) {
            console.log('aaaaaaa');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>