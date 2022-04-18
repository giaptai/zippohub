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
                        <a class="nav-link text-light" href="../user/cart.php">
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
                            <a class="nav-link text-light" href="./filephp/user/login_resgin/login_user.php">Đăng nhập</a>
                        </li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div style="display: flex; width:90%; margin:3rem auto 3rem auto; justify-content: space-between;">
        <div id="menu" class="list-group" style="width:16%;">
            <h5>Nguyễn Tiến</h5>
            <button type="button" class="list-group-item list-group-item-action">Thông tin cá nhân</button>
            <a type="button" class="list-group-item list-group-item-action active" href="./diachi.php?diachi&id=<?= $_SESSION['iduser'] ?>">Địa chỉ</a>
            <a type="button" class="list-group-item list-group-item-action" href="./lichsudonhang.php?lichsu&id=<?= $_SESSION['iduser'] ?>">Lịch sử đơn hàng</a>
            <a type="button" class="list-group-item list-group-item-action" href="./makhuyenmai.php?makhuyenmai&id=<?= $_SESSION['iduser'] ?>">Mã khuyến mãi</a>
            <button type="button" class="list-group-item list-group-item-action">Đơn đang giao</button>
            <button type="button" class="list-group-item list-group-item-action list-group-item-danger">Đăng xuất</button>
        </div>
        <!-- thong tin ca nhan -->
        <div id="manhinh" style="width:75%;">
            <form style="padding:0 2rem" class="ttcanhan" id="ttcanhan1113">
                <?php
                require_once('../query.php');
                    $id_user = $_GET['id_user'];
                    $id_addr = $_GET['id_addr'];
                    $sql = "SELECT * FROM diachikhach WHERE id_user=$id_user and id_addr=$id_addr";
                    //die($sql);
                     $result = executeSingleResult($sql);
                echo ' <h3>Sửa địa chỉ</h3>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="hotencanhan" value="' . $result['name'] . '" placeholder="name@example.com">
                    <label for="floatingInput">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="sdtcanhan" value="' . $result['phone'] . '" placeholder="name@example.com">
                    <label for="floatingInput">Số điện thoại</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="diachicanhan" value="' . $result['addr'] . '" placeholder="name@example.com">
                    <label for="floatingInput">Địa chỉ</label>
                </div>
                <div class="form-floating mb-3">
                    <button type="button" class="btn btn-success" onclick="updateInfo(' . $_SESSION['iduser'] . ')">Cập nhật</button>
                    <a class="btn btn-secondary" href="./diachi.php?diachi&id='.$_SESSION['iduser'].'">Quay lại</a>
                </div>';
                // }
                ?>
            </form>
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
        function updateInfo(id) {
            s1 = document.getElementById('hotencanhan').value;
            s2 = document.getElementById('sdtcanhan').value;
            s3 = document.getElementById('emailcanhan').value;
            s4 = document.getElementById('diachicanhan').value;
            console.log(s1, s2, s3, s4);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    alert(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sua_taikhoan_canhan.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('id=' + id +
                '&name=' + s1 +
                '&phone=' + s2 +
                '&email=' + s3 +
                '&addr=' + s4
            );
        }
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>