<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/zippohub/fontawesome/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <ul class="nav nav-tabs justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="./quanly_thongke.php">Thống kê</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="quanly_makhuyenmai.php">Quản lý mã khuyến mãi</a>
        </li>
        <li class="nav-item bg-light">
            <a class="nav-link active" aria-current="page" href="#">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_sanpham.php">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_taikhoan.php">Quản lý tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?exit">Quay lại ZippoHub</a>
        </li>
        <?php
        if (isset($_GET['exit'])) {
            session_start();
            unset($_SESSION['email']);
            unset($_SESSION['iduser']);
            unset($_SESSION['cart']);
            header('Location:../index.php');
        }
        ?>
    </ul>
    <?php
    require_once('../query.php');
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * 10;
    $trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : '';
    $sql = "SELECT * FROM hoadon";
    if ($trangthai == 'Tổng đơn' || empty($trangthai)) {
        $temp = $sql;
    } else {
        $sql .= " WHERE `statuss`='$trangthai'";
        $temp = $sql;
    }
    $sql .= " ORDER BY `statuss` ASC,`ngaymua` DESC LIMIT $start, 10";
    echo $sql . '--' . $temp;
    $result = executeResult($sql);
    $result1 = countRow($temp);
    $count = countRow('SELECT * FROM hoadon');
    $count1 = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Chờ xác nhận'");
    $count2 = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã xác nhận'");
    $count3 = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đang giao'");
    $count4 = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã giao'");
    $count5 = countRow("SELECT * FROM `hoadon` WHERE `statuss`='Đã hủy'");
    ?>
    <div class="d-block m-auto" style="width: 90%;">
        <div class="container m-0 p-0 mt-3">
            <div class="row justify-content-md-between">
                <div class="col-md-auto">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" <?= (!isset($_GET['trangthai']) || $_GET['trangthai'] == 'Tổng đơn') ? 'checked' : '' ?> value="Tổng đơn">
                    <label class="btn btn-outline-primary btn-sm" for="btnradio1">Tổng đơn<span class="badge bg-danger" id="badge_tongdon"><?= $count ?></span></label>
                </div>
                <div class="col-md-auto">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="Chờ xác nhận" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Chờ xác nhận') ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary btn-sm" for="btnradio2">Chờ xác nhận<span class="badge bg-danger" id="badge_choxacnhan"><?= $count1 ?></span></label>
                </div>
                <div class="col-md-auto">

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="Đã xác nhận" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đã xác nhận') ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary btn-sm" for="btnradio3">Đã xác nhận<span class="badge bg-danger" id="badge_daxacnhan"><?= $count2 ?></span></label>
                </div>
                <div class="col-md-auto">

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="Đang giao" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đang giao') ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary btn-sm" for="btnradio4">Đang giao<span class="badge bg-danger" id="badge_danggiao"><?= $count3 ?></span></label>
                </div>
                <div class="col-md-auto">

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="Đã giao" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đã giao') ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary btn-sm" for="btnradio5">Đã giao<span class="badge bg-danger" id="badge_dagiao"><?= $count4 ?></span></label>
                </div>
                <div class="col-md-auto">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off" value="Đã hủy" <?= (isset($_GET['trangthai']) && $_GET['trangthai'] == 'Đã hủy') ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary btn-sm" for="btnradio6">Đã hủy<span class="badge bg-danger" id="badge_dahuy"><?= $count5 ?></span></label>
                </div>
                <div class="col-md-auto">
                    <div class="input-group input-group-sm ">
                        <input type="text" class="form-control" placeholder="Mã hóa đơn" id="ipsearch" value="">
                        <button class="btn btn-outline-secondary" type="button" id="timkiem" onclick="timkiem()">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table align-middle caption-top">
            <caption>Quản lý đơn hàng</caption>
            <thead>
                <tr>
                    <th scope="col" style="width:10%">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label>Tất cả</label>
                    </th>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tổng sản phẩm</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" style="width:15%">Thao tác</th>
                </tr>
            </thead>
            <tbody id="table_tbody_donhang">
                <?php foreach ($result as $row) {
                    $StatusButtons = "";
                    echo '<tr>
                        <th scope="row">
                            <span>' . ++$start . '</span>
                        </th>
                        <td>' . $row['id_hoadon'] . '</td>
                        <td>' .  date("d-m-Y H:i:s", strtotime($row['ngaymua'])) . '</td>
                        <td>' . number_format($row['total_product']) . '</td>
                        <td>' . number_format($row['total_money']) . '</td>';
                    if ($row['statuss'] == 'Đã xác nhận') {
                        $StatusButtons = '<td><p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                            <td>
                                <a class="btn btn-outline-dark btn-sm" onclick="thaotac(' . $row["id_hoadon"] . ', `Đang giao`, this)">Đang giao</a>
                                <a class="btn text-danger btn-sm fa-solid fa-xmark fs-4" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)"></a>
                                <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a></td></tr>';
                    }
                    if ($row['statuss'] == 'Đã giao') {
                        $StatusButtons = '<td><p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p></td><td>
                            <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a>
                            </td>
                        </tr>';
                    }
                    if ($row['statuss'] == 'Chờ xác nhận') {
                        $StatusButtons = '<td><p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                            <td>
                                <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã xác nhận`, this)">Xác nhận</a>
                                <a class="btn text-danger btn-sm fa-solid fa-xmark fs-4" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã hủy`, this)"></a>
                                <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a></td></tr>';
                    }
                    if ($row['statuss'] == 'Đang giao') {
                        $StatusButtons = '<td><p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                            <td>
                                <a class="btn btn-outline-dark btn-sm" id="id' . $row['id_hoadon'] . '" onclick="thaotac(' . $row['id_hoadon'] . ', `Đã giao`, this)">Đã giao</a>
                                <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a></td></tr>';
                    }
                    if ($row['statuss'] == 'Đã hủy') {
                        $StatusButtons = '<td><p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p></td>
                            <td>
                            <a class="btn btn-sm fa-solid fa-circle-info fs-4 text-primary" href="./chitietdonhang.php?id=' . $row['id_hoadon'] . '"></a></td></tr>';
                    }
                    echo $StatusButtons;
                } ?>
            </tbody>
            <tfoot>
                <td colspan="7">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-center m-0" id="table_tfoot_donhang">
                            <?php
                            for ($i = 0; $i < ceil($result1 / 10); $i++) {
                                if (($i + 1) == $page) {
                                    echo '<li class="page-item active"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                                } else echo '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </td>
            </tfoot>
        </table>
    </div>

    <script>
        // tìm kiếm loại đơn hàng
        for (let i = 0; i < document.querySelectorAll('input[type="radio"]').length; i++) {
            document.querySelectorAll('input[type="radio"]')[i].addEventListener('click', function() {
                console.log(document.querySelectorAll('input[type="radio"]')[i].value);
                let val = document.querySelectorAll('input[type="radio"]')[i].value;
                //phantrang(1);
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        console.log(JSON.parse(this.responseText).arr2);
                        const nextURL = './quanly_donhang.php?trangthai=' + val;
                        const nextTitle = 'My new page title';
                        const nextState = {
                            additionalInformation: 'Updated the URL with JS'
                        };
                        //window.history.pushState(nextState, nextTitle, nextURL);
                        window.history.replaceState(nextState, nextTitle, nextURL);
                        arr1 = JSON.parse(this.responseText).arr1;
                        arr2 = JSON.parse(this.responseText).arr2;
                        document.getElementById('table_tbody_donhang').innerHTML = arr1;
                        document.getElementById('table_tfoot_donhang').innerHTML = arr2;
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/donhang.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=trangthai&value=' + val);
            })
        }

        function phantrang(p) {
            ss = document.querySelectorAll('input[type="radio"]');
            var val;
            for (i = 0; i < ss.length; i++) {
                if (ss[i].checked == true) {
                    val = ss[i].value;
                }
            }
            console.log(val);
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    //console.log(JSON.parse(this.responseText).arr2);
                    const nextURL = './quanly_donhang.php?trangthai=' + val + '&page=' + p;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    //window.history.pushState(nextState, nextTitle, nextURL);
                    window.history.replaceState(nextState, nextTitle, nextURL);
                    arr1 = JSON.parse(this.responseText).arr1;
                    arr2 = JSON.parse(this.responseText).arr2;
                    document.getElementById('table_tbody_donhang').innerHTML = arr1;
                    document.getElementById('table_tfoot_donhang').innerHTML = arr2;
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/donhang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=phantrang&page=' + p + '&value=' + val);
        }

        function timkiem() {
            let val = document.getElementById('ipsearch').value;
            if (val == '') {
                ss = (window.location.search).search(/page/); // tìm từ khóa page nó trả về vị trí đầu tiên thấy
                if (ss == -1) {
                    phantrang(1);
                } else {
                    page = window.location.search.slice(ss); //xóa path search chỉ còn 'page=số nào đó'
                    page = page.split('=')[1]; // tách bởi dấu bằng rồi chọn số
                    phantrang(page);
                }
            } else {
                var xhttp = new XMLHttpRequest() || ActiveXObject();
                //Bat su kien thay doi trang thai cuar request
                xhttp.onreadystatechange = function() {
                    //Kiem tra neu nhu da gui request thanh cong
                    if (this.readyState == 4 && this.status == 200) {
                        //In ra data nhan duoc
                        console.log(this.responseText);
                        arr1 = JSON.parse(this.responseText).arr1;
                        arr2 = JSON.parse(this.responseText).arr2;
                        document.getElementById('table_tbody_donhang').innerHTML = arr1;
                        document.getElementById('table_tfoot_donhang').innerHTML = arr2;
                    }
                }
                //cau hinh request
                xhttp.open('POST', './PHP_Function/donhang.php', true);
                //cau hinh header cho request
                xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                //gui request
                xhttp.send('action=timkiemma&id=' + val);
            }
        }

        function thaotac(id, act, ele) {
            console.log(id, act, ele);
            let s1 = ele.parentElement.parentElement;
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    if (act == 'Đã xác nhận') {
                        document.getElementById('badge_choxacnhan').innerText = parseInt(document.getElementById('badge_choxacnhan').innerText) - 1;
                        document.getElementById('badge_daxacnhan').innerText = parseInt(document.getElementById('badge_daxacnhan').innerText) + 1;
                        s1.children[6].children[0].outerHTML = '<a class="btn btn-outline-dark btn-sm" onclick="thaotac(' + id + ', `Đang giao`, this)">Đang giao</a>';
                        s1.children[5].innerHTML = '<p class="mb-0 text-primary" style="font-weight: 500;">Đã xác nhận</p>';
                    } else if (act == 'Đang giao') {
                        document.getElementById('badge_daxacnhan').innerText = parseInt(document.getElementById('badge_daxacnhan').innerText) - 1;
                        document.getElementById('badge_danggiao').innerText = parseInt(document.getElementById('badge_danggiao').innerText) + 1;
                        s1.children[6].children[0].outerHTML = '<a class="btn btn-outline-dark btn-sm" onclick="thaotac(' + id + ', `Đã giao`, this)">Đã giao</a>';
                        s1.children[6].removeChild(s1.children[6].children[1]);
                        s1.children[5].innerHTML = '<p class="mb-0" style="font-weight: 500;">Đang giao</p>';
                    } else if (act == 'Đã giao') {
                        document.getElementById('badge_danggiao').innerText = parseInt(document.getElementById('badge_danggiao').innerText) - 1;
                        document.getElementById('badge_dagiao').innerText = parseInt(document.getElementById('badge_dagiao').innerText) + 1;
                        s1.children[6].removeChild(s1.children[6].children[0]);
                        s1.children[5].innerHTML = '<p class="mb-0 text-success" style="font-weight: 500;">Đã giao</p>';
                    } else {
                        s1.children[6].removeChild(s1.children[6].children[0]);
                        s1.children[6].removeChild(s1.children[6].children[0]);
                        s1.children[5].innerHTML = '<p class="mb-0 text-danger" style="font-weight: 500;">Đã hủy</p>';
                    }
                    ss = (window.location.search).search(/page/); // tìm từ khóa page nó trả về vị trí đầu tiên thấy
                    if (ss == -1) {
                        phantrang(1);
                    } else {
                        page = window.location.search.slice(ss); //xóa path search chỉ còn 'page=số nào đó'
                        page = page.split('=')[1]; // tách bởi dấu bằng rồi chọn số
                        phantrang(page);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>