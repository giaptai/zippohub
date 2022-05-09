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
    <ul class="nav nav-tabs justify-content-end">
        <!-- <li class="nav-item bg-light">
            <a class="nav-link active" aria-current="page" href="#" onclick="history.forward()">Quay lại Quản lý đơn hàng</a>
        </li> -->
        <li class="nav-item bg-light">
            <button class="nav-link active" aria-current="page" onclick="console.log(document.referrer);window.location.href=document.referrer">Quay lại Quản lý đơn hàng</button>
        </li>
    </ul>
    <?php require_once('../query.php');
    session_start();
    $id_hoadon = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT sanpham.img as img, sanpham.name as name ,sanpham.price as price , chitiethoadon.amount as amount, chitiethoadon.total as total
        FROM chitiethoadon INNER JOIN hoadon on chitiethoadon.id_hoadon=hoadon.id_hoadon AND hoadon.id_hoadon=$id_hoadon 
        INNER JOIN sanpham on chitiethoadon.id_sanpham=sanpham.id";
    $sql0 = "SELECT * FROM hoadon where id_hoadon='{$id_hoadon}'";
    // $sql0 = "SELECT hoadon.id_hoadon as id_hoadon, hoadon.fullname as name , hoadon.phone as phone, hoadon.address as address, 
    //         hoadon.ngaymua as ngaymua, hoadon.total_money as total_money FROM taikhoan 
    //     INNER JOIN hoadon on hoadon.id_user=taikhoan.id and hoadon.id_user='$id_nguoidung' and hoadon.id_hoadon=$id_hoadon GROUP by hoadon.id_user";
    $result0 = executeSingleResult($sql0);
    $result1 = executeSingleResult("SELECT * FROM makhuyenmai WHERE id_khuyenmai='{$result0['magiamgia']}'");
    $result = executeResult($sql); ?>
    <!-- <h1 class="pt-4" style="text-align: center;">Chi tiết đơn hàng</h1>
    <div class="row row-cols-1 row-cols-md-3 pt-4 pb-4" style="width:95%; margin:auto">
        <div class="col">
            <?php
            echo '
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Địa chỉ</h5>
                    <b class="card-text pe-3">' . $result0['fullname'] . '</b>
                    <b class="card-text">' . $result0['phone'] . '</b>
                </div>
                <div class="card-header">
                    <span class="text-dark">' . $result0['address'] . '</span>
                </div>
            </div>';
            ?>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Ngày mua</h5>
                    <?php
                    echo '<b class="card-text pe-3">' . $result0['ngaymua'] . '</b>';
                    ?>

                </div>
                <div class="card-header">
                    <span class="text-dark">Giao hàng tận nơi PHÍ SHIP: 30,000 VNĐ</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Thanh toán</h5>
                    <p class="card-text">Qua thẻ ngân hàng</p>
                </div>
                <div class="card-header">
                    <span class="text-dark">Mã giao dịch (Ref): <b>0159652148545</b></span>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <section class="h-100 h-custom"> -->
    <div class="container h-100">
        <h1 class="pt-4" style="text-align: center;">Chi tiết đơn hàng</h1>
        <div class="row row-cols-1 row-cols-md-3 pt-4 pb-4">
            <div class="col">
                <?php
                echo '
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Địa chỉ</h5>
                    <b class="card-text pe-3">' . $result0['fullname'] . '</b>
                    <b class="card-text">' . $result0['phone'] . '</b>
                </div>
                <div class="card-header">
                    <span class="text-dark">' . $result0['address'] . '</span>
                </div>
            </div>';
                ?>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Ngày mua</h5>
                        <?php
                        echo '<b class="card-text pe-3">' . $result0['ngaymua'] . '</b>';
                        ?>

                    </div>
                    <div class="card-header">
                        <span class="text-dark">Giao hàng tận nơi PHÍ SHIP: 30,000 VNĐ</span>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Thanh toán</h5>
                        <p class="card-text">Qua thẻ ngân hàng</p>
                    </div>
                    <div class="card-header">
                        <span class="text-dark">Mã giao dịch (Ref): <b>0159652148545</b></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-end align-items-center h-100">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="h5 col-md-5">Sản phẩm</th>
                            <th class="col-md-3">Giá</th>
                            <th class="col-md-2">Số lượng</th>
                            <th class="col-md-2">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $tamtinh = 0;
                        foreach ($result as $row) {
                            $tamtinh += $row['total'];
                            echo '
                                    <tr>
                                        <td>
                                            <img src="../picture/' . $row['img'] . '" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                            <span class="ms-2">' . $row['name'] . '</span>
                                        </td>
                                        <td>
                                            <p class="mb-0" style="font-weight: 500;">' . number_format($row['price']) . '</p>
                                        </td>
                                        <td>
                                            <p class="mb-0" style="font-weight: 500;">' . number_format($row['amount']) . '</p>
                                        </td>
                                        <td>
                                            <p class="mb-0" style="font-weight: 500;">' . number_format($row['total']) . '</p>
                                        </td>
                                    </tr>
                                ';
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="col-md-auto"> -->
            <div class="card col-md-3 mb-3 p-4">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Đơn hàng: #<?= $result0['id_hoadon'] ?> </h5>
                    </div>
                </div>
                <div class="row pt-1 pb-3">
                    <div class="col-md-12">
                        <span>Phí vận chuyển: </span>
                        <span class="float-end">30,000</span>
                    </div>
                    <div class="col-md-12">
                        <span>Phí giao dịch: </span>
                        <span class="float-end">10,000</span>
                    </div>
                    <div class="col-md-12">
                        <span>Tạm tính: </span>
                        <span class="float-end"><?= number_format($tamtinh + 30000 + 10000) ?></span>
                    </div>
                    <div class="col-md-12">
                        <span>Khuyến mãi: </span>
                        <span class="float-end"><?= number_format(isset($result1['giamgia']) ? -$result1['giamgia'] : 0) ?></span>
                    </div>
                </div>

                <hr class="dropdown-divider">
                <div class="row">
                    <div class="col-md-12">
                        <span><b class="fs-5">Tổng tiền: </b></span>
                        <span class="float-end"><b class="fs-5"><?= number_format($result0['total_money']) ?></b></span>
                    </div>
                </div>
                <hr class="dropdown-divider">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                        <?php
                        $s['arr1'] = '';
                        if ($result0['statuss'] == 'Chờ xác nhận') {
                            $s['arr1'] .= '<a class="btn btn-light"  onclick="thaotac(' . $result0['id_hoadon'] . ', `Đã xác nhận`, this)">' . $result0['statuss'] . '</a>
                                <a class="btn btn-danger" onclick="thaotac(' . $result0['id_hoadon'] . ', `Đã hủy`, this)">Hủy đơn</a>';
                        }
                        if ($result0['statuss'] == 'Đã xác nhận') {
                            $s['arr1'] .= '
                                <a class="btn btn-primary" onclick="thaotac(' . $result0["id_hoadon"] . ', `Đang giao`, this)">' . $result0['statuss'] . '</a>
                                <a class="btn btn-danger" onclick="thaotac(' . $result0['id_hoadon'] . ', `Đã hủy`, this)">Hủy đơn</a>';
                        }
                        if ($result0['statuss'] == 'Đang giao') {
                            $s['arr1'] .= '<a class="btn btn-outline-dark" onclick="thaotac(' . $result0['id_hoadon'] . ', `Đã giao`, this)">' . $result0['statuss'] . '</a>';
                        }
                        if ($result0['statuss'] == 'Đã hủy') {
                            $s['arr1'] .= '<a class="btn btn-danger">' . $result0['statuss'] . '</a>';
                        }
                        if ($result0['statuss'] == 'Đã giao') {
                            $s['arr1'] .= '<a class="btn btn-success">' . $result0['statuss'] . '</a>';
                        }
                        echo $s['arr1'];
                        ?>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <!-- </section> -->

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
        function thaotac(id, act, ele) {
            console.log(id, act, ele);
            let s1 = ele.parentElement.parentElement;
            console.log(s1.children[0].children[1]);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (act == 'Đã xác nhận') {
                        ele.outerHTML = '<a class="btn btn-primary"  onclick="thaotac(' + id + ',  `Đang giao`, this)">Đã xác nhận</a>';
                    } else if (act == 'Đang giao') {
                        ele.outerHTML = '<a class="btn btn-outline-dark"  onclick="thaotac(' + id + ',  `Đã giao`, this)">Đang giao</a>';
                        s1.children[0].removeChild(s1.children[0].children[1])
                    } else if (act == 'Đã giao') {
                        ele.outerHTML = '<a class="btn btn-success">Đã giao</a>';
                    } else {
                        s1.children[0].removeChild(s1.children[0].children[0])
                        ele.innerText = 'Đã hủy';
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/donhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('thaotacdon&id=' + id + '&act=' + act);
        }
    </script>
    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>