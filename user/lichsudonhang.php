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

    <?php echo $_SESSION['iduser'] ?>

    <div class="container mt-4 mb-4">
        <div class="row justify-content-around">
            <div class="col-md-2 p-0 mb-4">
                <div id="menu" class="list-group" style="width:100%;">
                    <h5>Nguyễn Tiến</h5>
                    <a type="button" class="list-group-item list-group-item-action" href="./canhan.php?id=<?= $_SESSION['iduser'] ?>">Thông tin cá nhân</a>
                    <a type="button" class="list-group-item list-group-item-action" href="./diachi.php?diachi&id=<?= $_SESSION['iduser'] ?>">Địa chỉ</a>
                    <a type="button" class="list-group-item list-group-item-action active">Lịch sử đơn hàng</a>
                    <a type="button" class="list-group-item list-group-item-action" href="./makhuyenmai.php?makhuyenmai&id=<?= $_SESSION['iduser'] ?>">Mã khuyến mãi</a>
                    <button type="button" class="list-group-item list-group-item-action list-group-item-danger">Đăng xuất</button>
                </div>
            </div>
            <div class="col-md-9 p-0">
                <div id="manhinh">
                    <div style="padding:0 1rem 1rem 1rem;" id="lichsudonhang">
                        <div class="btn-group justify-content-between p-1" style="width:100%; ">
                            <?php
                            if (!isset($_GET['trangthai']) || empty($_GET['trangthai'])) {
                                echo '
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="" onclick="trangthai(this, ' . $_SESSION['iduser'] . ')" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Tất cả đơn</label>';
                            } else {
                                echo '
                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="" onclick="trangthai(this, ' . $_SESSION['iduser'] . ')" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="btnradio1">Tất cả đơn</label>';
                            }
                            ?>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="Chờ xác nhận" onclick="trangthai(this, <?= $_SESSION['iduser'] ?>)" autocomplete="off" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Chờ xác nhận') ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" for="btnradio2">Chờ xác nhận</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" value="Đã xác nhận" onclick="trangthai(this, <?= $_SESSION['iduser'] ?>)" autocomplete="off" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đã xác nhận') ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" for="btnradio3">Đã xác nhận</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio4" value="Đang giao" onclick="trangthai(this, <?= $_SESSION['iduser'] ?>)" autocomplete="off" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đang giao') ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" for="btnradio4">Đang giao</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio5" value="Đã giao" onclick="trangthai(this, <?= $_SESSION['iduser'] ?>)" autocomplete="off" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đã giao') ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" for="btnradio5">Đã giao</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio6" value="Đã hủy" onclick="trangthai(this, <?= $_SESSION['iduser'] ?>)" autocomplete="off" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đã hủy') ? 'checked' : '' ?>>
                            <label class="btn btn-outline-primary" for="btnradio6">Đã hủy</label>
                        </div>
                        <div class="input-group">
                            <input type="text" id='madon' placeholder="Nhập mã đơn hàng" class="form-control">
                            <button class="input-group-text" onclick="searchID(document.getElementById('madon').value)">Tìm kiếm</button>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody id="orderlist">
                                <?php require_once('../query.php');
                                if (isset($_GET['lichsu'])) {
                                    //echo $_GET['trangthai'];
                                    $trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : "";
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($page - 1) * 10;
                                    if (empty($trangthai)) {
                                        $sql = "SELECT * FROM hoadon LIMIT $start, 10";
                                        $sql0 = "SELECT * FROM hoadon";
                                    } else {
                                        $sql = "SELECT * FROM hoadon WHERE statuss='{$trangthai}' LIMIT $start, 10";
                                        $sql0 = "SELECT * FROM hoadon WHERE statuss='{$trangthai}'";
                                    }
                                    //die($sql);
                                    $result = executeResult($sql);
                                    $resul1t = countRow($sql0);
                                    if ($result) {
                                        foreach ($result as $row) {
                                            echo '<tr>
                                                <th class="align-middle">
                                                    <p class="mb-0">' . $row['id_hoadon'] . '</p>
                                                </th>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">' . date("d-m-Y H:i:s", strtotime($row['ngaymua'])) . '</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_product']) . '</p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_money']) . '</p>
                                                </td>';
                                            if ($row['statuss'] == 'Chờ xác nhận') {
                                                echo '<td class="align-middle">
                                                    <p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                                </td>';
                                            }
                                            if ($row['statuss'] == 'Đã xác nhận') {
                                                echo '<td class="align-middle">
                                                    <p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                                </td>';
                                            }
                                            if ($row['statuss'] == 'Đang giao') {
                                                echo '<td class="align-middle">
                                                    <p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                                </td>';
                                            }
                                            if ($row['statuss'] == 'Đã hủy') {
                                                echo '<td class="align-middle">
                                                    <p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                                </td>';
                                            }
                                            if ($row['statuss'] == 'Đã giao') {
                                                echo '<td class="align-middle">
                                                    <p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                                </td>';
                                            }
                                            echo '<td class="align-middle">
                                                    <a class="mb-0 btn btn-sm btn-primary" href="./chitietdonhang_user.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                                                </td>
                                        </tr>';
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm justify-content-center" id="phantrang">
                                <?php
                                for ($i = 0; $i < ceil($resul1t / 10); $i++) {
                                    echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ', ' . $_SESSION['iduser'] . ')">' . ($i + 1) . '</a></li>';
                                }
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
        function tiennguyen() {
            let ss = document.getElementById('dattee').value.split('-');
            console.log(ss);
            if (ss == undefined) {
                return
            } else {
                document.getElementById('assss').value = ss[2] + '-' + ss[1] + '-' + ss[0];
            }
        }

        function searchID(dt) {
            console.log(dt);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    // const nextURL = './lichsudonhang.php?lichsu&id=' + id + '&trangthai=' + s + '&page=' + 1;
                    // const nextTitle = 'My new page title';
                    // const nextState = {
                    //     additionalInformation: 'Updated the URL with JS'
                    // };
                    // window.history.pushState(nextState, nextTitle, nextURL);
                    //window.history.replaceState(nextState, nextTitle, nextURL);
                    let ds = JSON.parse(this.responseText).arr1;
                    let ptr = JSON.parse(this.responseText).arr2;
                    document.getElementById('orderlist').innerHTML = ds;
                    document.getElementById('phantrang').innerHTML = ptr;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_lichsudonhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('searchID&id=' + dt);
        }

        function trangthai(val, id) { // chọn tình trạng đơn hàng 
            //console.log(val.value, p);
            let s = val.value;
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    const nextURL = './lichsudonhang.php?lichsu&id=' + id + '&trangthai=' + s + '&page=' + 1;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    window.history.pushState(nextState, nextTitle, nextURL);
                    //window.history.replaceState(nextState, nextTitle, nextURL);
                    let ds = JSON.parse(this.responseText).arr1;
                    let ptr = JSON.parse(this.responseText).arr2;
                    document.getElementById('orderlist').innerHTML = ds;
                    document.getElementById('phantrang').innerHTML = ptr;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_lichsudonhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('trangthai&val=' + s);
        }

        function phantrang(p, id) { // phân trang trong dơn hàng
            let s = document.getElementById('lichsudonhang').children[0].querySelectorAll("input[type='radio']");
            var ss;
            const urll = (window.location.search).split('&');
            console.log(id);
            for (let i = 0; i < s.length; i++) {
                if (s[i].checked) {
                    ss = s[i].value;
                }
            }
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (ss == '') {
                        nextURL = './lichsudonhang.php?lichsu&id=' + id + '&page=' + p;
                    } else nextURL = './lichsudonhang.php?lichsu&id=' + id + '&trangthai=' + ss + '&page=' + p;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    window.history.pushState(nextState, nextTitle, nextURL);
                    //window.history.replaceState(nextState, nextTitle, nextURL);
                    let ds = JSON.parse(this.responseText).arr1;
                    let ptr = JSON.parse(this.responseText).arr2;
                    document.getElementById('orderlist').innerHTML = ds;
                    document.getElementById('phantrang').innerHTML = ptr;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/display_lichsudonhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('phantrang&val=' + ss + '&page=' + p);
        }

                // hien dnah sach don hang
        // displayOrder();

        // function displayOrder() {
        //     var xhttp = new XMLHttpRequest() || ActiveXObject();
        //     xhttp.onreadystatechange = function() {
        //         //Kiem tra neu nhu da gui request thanh cong
        //         if (this.readyState == 4 && this.status == 200) {
        //             //In ra data nhan duoc
        //             let ds = JSON.parse(this.responseText).arr1;
        //             let ptr = JSON.parse(this.responseText).arr2;
        //             document.getElementById('orderlist').innerHTML = ds;
        //             document.getElementById('phantrang').innerHTML = ptr;
        //         }
        //     }
        //     //cau hinh request
        //     xhttp.open('POST', './PHP_Function/display_lichsudonhang.php', true);
        //     //cau hinh header cho request
        //     xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     //gui request
        //     xhttp.send('trangthai');
        // }
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>