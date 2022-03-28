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


    <?php
    echo $_SESSION['iduser'] ?>
    <div style="display: flex; width:90%; margin:3rem auto 3rem auto; justify-content: space-between;">
        <div id="menu" class="list-group" style="width:16%;">
            <h5>Nguyễn Tiến</h5>
            <a type="button" class="list-group-item list-group-item-action" href='./canhan.php?id=<?= $_SESSION['iduser'] ?>'>Thông tin cá nhân</a>
            <button type="button" class="list-group-item list-group-item-action active">Địa chỉ</button>
            <a type="button" class="list-group-item list-group-item-action" href="./lichsudonhang.php?lichsu&id=<?= $_SESSION['iduser'] ?>">Lịch sử đơn hàng</a>
            <button type="button" class="list-group-item list-group-item-action">Mã khuyến mãi</button>
            <button type="button" class="list-group-item list-group-item-action">Đơn đang giao</button>
            <button type="button" class="list-group-item list-group-item-action list-group-item-danger">Đăng xuất</button>
        </div>
        <!-- thong tin ca nhan -->
        <div id="manhinh" style="width:75%;">
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
                    <!-- <div class="item mt-3" style="border: 1px ridge">
                        <div class="d-flex justify-content-between p-2">
                            <div class="info">
                                <div class="name">Nguyễn Vĩnh Tiến</div>
                                <div class="address"><span>Địa chỉ: </span>267/5a tân chánh hiệp, Phường Tân Chánh Hiệp, Quận 12, Hồ Chí Minh</div>
                                <div class="phone"><span>Điện thoại: </span>0388875727</div>
                            </div>
                            <div><a class="text-primary text-decoration-none fs-6" href="">Chỉnh sửa</a>
                                <a class="btn btn-light text-danger btn-sm fs-6" href="">Xóa</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- 
                    <div class="item mt-3" style="border: 1px ridge">
                        <div class="d-flex justify-content-between p-2">
                            <div class="info">
                                <div class="name">Nguyễn Giáp Tài</div>
                                <div class="address"><span>Địa chỉ: </span>267/5a tân chánh hiệp, Phường Tân Chánh Hiệp, Quận 12, Hồ Chí Minh</div>
                                <div class="phone"><span>Điện thoại: </span>0388875727</div>
                            </div>
                            <div><a class="text-primary text-decoration-none fs-6" href="">Chỉnh sửa</a></div>
                        </div>
                    </div> -->
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
                                        <div><a class="text-primary text-decoration-none fs-6" >Chỉnh sửa</a>
                                            <a class="btn btn-light text-danger btn-sm fs-6" onclick="xoaDiaChi(this, ' . $arr['id_addr'] . ')">Xóa</a>
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
        }

        function addAr(id) {
            let s1 = document.getElementById('dc_hoten').value;
            let s2 = document.getElementById('dc_sdt').value;
            let s3 = document.getElementById('dc_diachi').value;
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    alert(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/them_diachi.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('id_user=' + id + '&name=' + s1 + '&phone=' + s2 + '&addr=' + s3);
        }
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>