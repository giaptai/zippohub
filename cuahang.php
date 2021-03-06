<?php session_start();
if (isset($_POST["xemthem"])) {
    $_SESSION["xemthem"] = $_POST["xemthem"];
} ?>
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
    .a {
        object-fit: cover;
    }

    .card:hover {
        border: 0.5px solid;
        transform: scale(1.02);
        transition: 0.5s ease-in-out;
    }

    .card-img-top:hover {
        transform: translate(0, -3%);
        transition: 0.3s ease-in;
    }

    /* .card {
        transition: 0.2s ease-in-out;
        /* margin: 0 1rem 0 0; 
    }*/
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="nav nav-pills align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="./index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark bg-light">Cửa hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./user/cart.php">
                            Giỏ hàng <span class="badge bg-secondary" id="cartcount">
                                <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) :  0; ?></span>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo
                        '</span></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="./user/canhan.php">Tài khoản</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" onclick="logout()">Đăng xuất</a></li>
                            </ul>
                        </li>';
                    } else echo
                    '<li class="nav-item">
                            <a class="nav-link text-light" href="./user/login_user.php">Đăng nhập</a>
                        </li>';
                    ?>
                </ul>
                <ul class="nav nav-pills align-items-right">
                    <li class="nav-item">
                        <input class="form-control me-3" type="search" placeholder="Tên sản phẩm" id="search">
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-outline-light" type="submit" onclick="searchNameProduct()">Tìm kiếm</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-4">
        <div class="row justify-content-between">
            <div class="col-md-3 p-0">
                <div class="col-md-10 p-0">
                    <button class="btn btn-primary w-100 mb-3" type="button">
                        Tìm kiếm nâng cao
                    </button>
                    <!-- collapse -->
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="list-group">
                                <h5>Danh mục sản phẩm</h5>
                                <label class="list-group-item ">
                                    <input class="form-check-input" type="checkbox" value="All" onclick="uncheck()" <?= isset($_GET['search1']) && $_GET['search1'] == 'All' ? 'checked' : '' ?>>Tất cả sản phẩm
                                </label>
                                <label class="list-group-item">
                                    <input class="form-check-input" type="checkbox" value="Zippo Armor" onclick="uncheck1()" <?= (isset($_GET['search1']) && $_GET['search1'] == 'Zippo Armor') ||
                                                                                                                                    (isset($_GET['search2']) && $_GET['search2'] == 'Zippo Armor') ||
                                                                                                                                    (isset($_GET['search3']) && $_GET['search3'] == 'Zippo Armor') ? 'checked' : '' ?>>Zippo Armor
                                </label>
                                <label class="list-group-item ">
                                    <input class="form-check-input" type="checkbox" value="Zippo Sterling Silver" onclick="uncheck1()" <?= (isset($_GET['search1']) && $_GET['search1'] == 'Zippo Sterling Silver') ||
                                                                                                                                            (isset($_GET['search2']) && $_GET['search2'] == 'Zippo Sterling Silver') ||
                                                                                                                                            (isset($_GET['search3']) && $_GET['search3'] == 'Zippo Sterling Silver') ? 'checked' : '' ?>>Zippo Sterling Silver
                                </label>
                                <label class="list-group-item">
                                    <input class="form-check-input" type="checkbox" value="Zippo Base Models" onclick="uncheck1()" <?= (isset($_GET['search1']) && $_GET['search1'] == 'Zippo Base Models') ||
                                                                                                                                        (isset($_GET['search2']) && $_GET['search2'] == 'Zippo Base Models') ||
                                                                                                                                        (isset($_GET['search3']) && $_GET['search3'] == 'Zippo Base Models') ? 'checked' : '' ?>>Zippo Base Models
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row ">
                                <h5>Nhập giá</h5>
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Từ</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control form-control-sm" id="pricefrom" placeholder="0" value="<?= isset($_GET['pricefrom']) ? $_GET['pricefrom'] : '' ?>">
                                </div>
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Đến</label>
                                <div class="col-sm-9">
                                    <input type="number" min="0" max="999999999" value="<?= isset($_GET['priceto']) ? $_GET['priceto'] : '' ?>" class="form-control form-control-sm" id="priceto" placeholder="0">
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="d-flex bd-highlight">
                                    <div class="flex-sm-grow-1 bd-highlight">
                                        <h5>Chất liệu</h5>
                                    </div>
                                    <select class="form-select form-select-sm w-50 flex-sm-grow-1 bd-highlight" aria-label=".form-select-sm example" id="material">
                                        <option value="" <?= !isset($_GET['material']) ? 'selected' : '' ?>>Tất cả</option>
                                        <option value="Đồng" <?= isset($_GET['material']) && $_GET['material'] == 'Đồng' ? 'selected' : '' ?>>Đồng</option>
                                        <option value="Bạc" <?= isset($_GET['material']) && $_GET['material'] == 'Bạc' ? 'selected' : '' ?>>Bạc</option>
                                        <option value="Vàng" <?= isset($_GET['material']) && $_GET['material'] == 'Vàng' ? 'selected' : '' ?>>Vàng</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="d-flex bd-highlight">
                                    <div class="flex-sm-grow-1 bd-highlight">
                                        <h5>Xuất xứ</h5>
                                    </div>
                                    <select class="form-select form-select-sm w-50 flex-sm-grow-1 bd-highlight" aria-label=".form-select-sm example" id="madeby">
                                        <option value="" selected>Tất cả</option>
                                        <option value="Nhật Bản" <?= isset($_GET['madeby']) && $_GET['madeby'] == 'Nhật Bản' ? 'selected' : '' ?>>Nhật Bản</option>
                                        <option value="Hàn Quốc" <?= isset($_GET['madeby']) && $_GET['madeby'] == 'Hàn Quốc' ? 'selected' : '' ?>>Hàn Quốc</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <button type="button" class="btn btn-primary btn-sm mb-2" onclick="timkiem(1, 'xemketqua')" id="xemketqua">Xem kết quả</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="huyhet()">Hủy</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            require_once('./query.php');
            $arr = array('arr1' => '', 'pagin' => '');
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * 10;
            $sql = "SELECT * FROM sanpham";
            if (isset($_GET['search1']) && $_GET['search1'] == 'All') {
                $sql = "SELECT * FROM sanpham";
                $temp = $sql;
            }
            if (isset($_GET['key'])) {
                $sql .= " WHERE name LIKE '%{$_GET['key']}%'";
                $temp = $sql;
            } else {
                $sql .= " where ( category like '%" . (isset($_GET['search1']) && $_GET['search1'] != 'All' ? $_GET['search1'] : '') . "%' ";
                if (isset($_GET['search2']) && !isset($_GET['search3'])) {
                    $sql .= "or category like '%" . $_GET['search2'] . "%'";
                }
                if (isset($_GET['search2']) && isset($_GET['search3'])) {
                    $sql .= "or category like '%" . $_GET['search2'] . "%' or category like '%" . $_GET['search3'] . "%'";
                }
                $pricefrom = isset($_GET['pricefrom']) ? $_GET['pricefrom'] : 0;
                $priceto = isset($_GET['priceto']) ? $_GET['priceto'] : PHP_INT_MAX;
                $material = isset($_GET['material']) ? $_GET['material'] : '';
                $madeby = isset($_GET['madeby']) ? $_GET['madeby'] : '';
                $sql .= ") AND (price BETWEEN {$pricefrom} and {$priceto}) and material like '%{$material}%' and madeby like '%{$madeby}%'";
                $temp = $sql;
            }
            $sql .= " ORDER BY `price` ASC LIMIT $start,10";
            //echo $sql;
            $result = executeResult($sql);
            $result1 = countRow($temp);
            ?>
            <div class="col-md-9 p-0">
                <span>Tìm kiếm với tên sản phẩm: <b id="searchname"><?= isset($_GET['key']) ? $_GET['key'] : 'Không có' ?></b></span>
                <div class="row row-cols-2 row-cols-md-5 g-2 mt-1" id="sanpham">
                    <?php
                    if (sizeof($result) > 0) {
                        foreach ($result as $sp) {
                            $arr['arr1'] .= '<div class="col">
                            <div class="card p-3 h-100" style="text-align: center;">
                            
                                <a href="./user/hien_chitiet_sanpham_grid.php?id=' . $sp['id'] . '"><img style="object-fit: cover; width:7rem; height:8rem;" src="./picture/' . $sp['img'] . '" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h6 class="card-title">' . $sp['name'] . '</h6>
                                    <p class="card-text">' . number_format($sp['price']) . ' VNĐ</p></div>';
                            if (!isset($_SESSION["cart"][$sp['id']])) {
                                $arr['arr1'] .= '<div ><a class="btn btn-sm btn-outline-primary" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Thêm vào giỏ</a>';
                            } else {
                                $arr['arr1'] .= '<div ><a class="btn btn-sm btn-primary disabled" id="id' . $sp['id'] . '" onclick="buyproduct(' . $sp['id'] . ')">Đã thêm vào giỏ</a>';
                            }
                            $arr['arr1'] .= ' 
                                        </div>
                                    </div>
                                    </div>';
                        }
                    } else $arr['arr1'] = "Không tìm thấy sản phẩm !";
                    echo $arr['arr1'];
                    ?>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center m-3" id="pagination">
                        <?php
                        for ($i = 0; $i < ceil(($result1) / 10); $i++) {
                            if ($i == $page - 1) {
                                $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-primary btn-sm active" onclick="timkiem(' . ($i + 1) . ', `' . (isset($_GET["key"]) ? $_GET["key"] : 'xemketqua') . '` )">' . ($i + 1) . '</a></li>';
                            } else  $arr['pagin'] .= '<li class="page-item"><a class="btn btn-outline-primary btn-sm" onclick="timkiem(' . ($i + 1) . ', `' . (isset($_GET["key"]) ? $_GET["key"] : 'xemketqua') . '`)">' . ($i + 1) . '</a></li>';
                        }
                        echo  $arr['pagin'];
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-muted">
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © <?php echo date("Y"); ?> Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script>
        // display_cuahang();

        // function display_cuahang() {
        //     var xhttp = new XMLHttpRequest() || ActiveXObject();
        //     //Bat su kien thay doi trang thai cuar request
        //     xhttp.onreadystatechange = function() {
        //         //Kiem tra neu nhu da gui request thanh cong
        //         if (this.readyState == 4 && this.status == 200) {
        //             //In ra data nhan duoc
        //             console.log(this.responseText)
        //             let s0 = JSON.parse(this.responseText).arr1;
        //             let pagin = JSON.parse(this.responseText).pagin;
        //             document.getElementById('sanpham').innerHTML = s0;
        //             document.getElementById('pagination').innerHTML = pagin;
        //             //console.log((this.responseText));
        //         }
        //     }
        //     //cau hinh request
        //     xhttp.open('POST', './user/PHP_Function/display_cuahang.php', true);
        //     //cau hinh header cho request
        //     xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     //gui request
        //     xhttp.send('action=displaycuahang');
        // }

        function searchNameProduct() {
            s1 = document.getElementById('search').value;
            if (s1 != '') {
                window.location.href = "cuahang.php?key=" + s1 + "&page=1";
            } else alert('Ô tìm kiếm trống !');
            // var xhttp = new XMLHttpRequest() || ActiveXObject();
            // //Bat su kien thay doi trang thai cuar request
            // xhttp.onreadystatechange = function() {
            //     //Kiem tra neu nhu da gui request thanh cong
            //     if (this.readyState == 4 && this.status == 200) {
            //         //In ra data nhan duoc
            //         console.log(this.responseText)
            //         let s0 = JSON.parse(this.responseText).arr1;
            //         let pagin = JSON.parse(this.responseText).pagin;
            //         let url = JSON.parse(this.responseText).url;
            //         document.getElementById('sanpham').innerHTML = s0;
            //         document.getElementById('pagination').innerHTML = pagin;
            //         const nextURL = url;
            //         const nextTitle = 'My new page title';
            //         const nextState = {
            //             additionalInformation: 'Updated the URL with JS'
            //         };
            //         //window.history.pushState(nextState, nextTitle, nextURL);
            //         window.history.replaceState(nextState, nextTitle, nextURL);
            //         document.getElementById('searchname').innerHTML=(s1 == '' ? 'Không có':s1);
            //     }
            // }
            // //cau hinh request
            // xhttp.open('POST', './user/PHP_Function/display_cuahang.php', true);
            // //cau hinh header cho request
            // xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // //gui request
            // xhttp.send('action=timkiem&key=' + s1);
        }

        function timkiem(p, xkq) {
            let pricefrom = document.getElementById('pricefrom').value;
            let priceto = document.getElementById('priceto').value;
            let material = document.getElementById('material').value;
            let madeby = document.getElementById('madeby').value;
            console.log(xkq);
            ss = (window.location.search).search(/key/);
            key = window.location.search.slice(ss);
            key = key.split(/&(.*)/s)[0];
            key = key.split('=')[1];

            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log(this.responseText);
                    let s0 = JSON.parse(this.responseText).arr1;
                    let pagin = JSON.parse(this.responseText).pagin;
                    let url = JSON.parse(this.responseText).url;
                    const nextURL = url;
                    const nextTitle = 'My new page title';
                    const nextState = {
                        additionalInformation: 'Updated the URL with JS'
                    };
                    //window.history.pushState(nextState, nextTitle, nextURL);
                    window.history.replaceState(nextState, nextTitle, nextURL);
                    document.getElementById('sanpham').innerHTML = s0;
                    document.getElementById('pagination').innerHTML = pagin;
                    document.getElementById('searchname').innerHTML = (xkq == 'xemketqua' ? 'Không có' : key);
                }
            }
            //cau hinh request
            xhttp.open('POST', './user/PHP_Function/display_cuahang.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=search' +
                '&checkbox=' + getCheckBoxes() +
                '&page=' + p +
                '&pricefrom=' + pricefrom +
                '&priceto=' + priceto +
                '&material=' + material +
                '&madeby=' + madeby +
                (xkq == 'xemketqua' ? '' : '&key=' + key)
            );
        }

        function getCheckBoxes() {
            let arr = []
            let s = document.querySelectorAll('input[type=checkbox]');
            for (let i = 0; i < s.length; i++) {
                if (s[i].checked) {
                    arr.push(s[i].value)
                }
            }
            return arr;
        }

        function uncheck() {
            s = document.querySelectorAll('input[type=checkbox]');
            if (s[0].checked) {
                s[1].checked = false;
                s[2].checked = false;
                s[3].checked = false;
            } else s[0].checked = true;
        }
        uncheck1()

        function uncheck1() {
            s = document.querySelectorAll('input[type=checkbox]');
            if (s[1].checked == false && s[2].checked == false && s[3].checked == false) {
                s[0].checked = true;
            } else s[0].checked = false;
        }

        function buyproduct(e) {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    console.log(JSON.parse(this.responseText));
                    let s1=JSON.parse(this.responseText).arr1;
                    let s2=JSON.parse(this.responseText).arr2;
                    if(s1=='success'){
                        document.getElementById('cartcount').innerHTML=s2;
                        let btn = document.getElementById("id" + e)
                        btn.innerText = "Đã thêm vào giỏ"
                        btn.classList.add('disabled')
                        btn.classList.add('btn-primary')
                        btn.classList.remove('btn-outline-primary')
                    }else {
                        alert('Mỗi tài khoản chỉ mua tối đa 5 sản phẩm !');
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './user/PHP_Function/display_cart.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('data=' + e + '&mua');
        }

        function logout() {
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc
                    window.location.href = "./user/login_user.php";
                }
            }
            //cau hinh request
            xhttp.open('POST', './user/PHP_Function/dangnhap_dangki.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('logout');
        }

        function huyhet() {
            document.querySelectorAll('input[type=checkbox]')[0].checked = true;
            uncheck();
            document.getElementById('pricefrom').value = '';
            document.getElementById('priceto').value = '';
            document.getElementById('material').value = '';
            document.getElementById('madeby').value = '';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>