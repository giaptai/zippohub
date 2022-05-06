<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul class="nav nav-tabs justify-content-end">
        <!-- <li class="nav-item">
            <a class="nav-link active" href="./quanly_sanpham.php">Quay lại Quản lý sản phẩm</a>
        </li> -->
        <li class="nav-item bg-light">
            <button class="nav-link active" aria-current="page" onclick="console.log(document.referrer);window.location.href=document.referrer">Quay lại Quản lý sản phẩm</button>
        </li>
    </ul>
    <!--  -->

    <!-- Modal Them san pham -->
    <div class="container-md ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h4>Thêm sản phẩm</h4>
                <div class="col-md-auto">
                    <img style="object-fit: cover;" src="../picture/" class="rounded" alt="..." width="auto" height="200">
                </div>
                <div class="col-md-auto">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="inputGroupFile02" id="inputGroupFile02" value="">
                        <button onclick="uploadd()" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Upload</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" disabled placeholder="1" name="codez" id="codez" value="<?php echo rand(1, 10000) ?>">
                            <label for="floatingInput">Mã sản phẩm</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="namee" id="namee" placeholder="1" value="">
                            <label for="floatingInput">Tên sản phẩm</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="mb-3">
                        <label class="form-label">Giới thiệu:</label>
                        <textarea name="gioithieu" id="gioithieu" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Thể loại:</label>
                            <select class="form-select" name="theloai" id="theloai">
                                <option value="Zippo Armor">Zippo Armor</option>
                                <option value="Zippo Sterling Silver">Zippo Sterling Silver</option>
                                <option value="Zippo Base Models">Zippo Base Models</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Chất liệu:</label>
                            <select class="form-select" name="chatlieu" id="chatlieu">
                                <option value="Đồng">Đồng</option>
                                <option value="Bạc">Bạc</option>
                                <option value="Vàng">Vàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Xuất xứ:</label>
                            <select class="form-select" name="xuatxu" id="xuatxu">
                                <option value="Nhật Bản">Nhật Bản</option>
                                <option value="Hàn Quốc">Hàn Quốc</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tình trạng:</label>
                            <select class="form-select" name="tinhtrang" id="tinhtrang">
                                <option value="1">Còn hàng</option>
                                <option value="0">Hết hàng</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class=" mb-3">
                            <label for="" class="form-label">Số lượng:</label>
                            <input type="number" class="form-control" name="amountt" id="amountt" placeholder="1" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Giá:</label>
                            <input type="number" class="form-control" name="prices" id="prices" placeholder="1" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        <a class="btn btn-secondary" href="./quanly_sanpham.php">Quay lại</a>
                        <button type="button" class="btn btn-primary" onclick="addproduct()">Thêm</button>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>

        <!-- <form class="m-auto">
            <h4>Thêm sản phẩm</h4>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <img style="object-fit: cover;" src="../picture/" class="rounded" alt="..." width="auto" height="200">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="inputGroupFile02" id="inputGroupFile02" value="">
                        <button onclick="uploadd()" class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Upload</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" disabled placeholder="1" name="codez" id="codez" value="<?php echo rand(1, 10000) ?>">
                        <label for="floatingInput">Mã sản phẩm</label>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="namee" id="namee" placeholder="1" value="">
                        <label for="floatingInput">Tên sản phẩm</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-3">
                        <label class="form-label">Giới thiệu:</label>
                        <textarea name="gioithieu" id="gioithieu" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2 offset-md-3">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Thể loại:</label>
                        <select class="form-select" name="theloai" id="theloai">
                            <option value="Zippo Armor">Zippo Armor</option>
                            <option value="Zippo Sterling Silver">Zippo Sterling Silver</option>
                            <option value="Zippo Base Models">Zippo Base Models</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Chất liệu:</label>
                        <select class="form-select" name="chatlieu" id="chatlieu">
                            <option value="Đồng">Đồng</option>
                            <option value="Bạc">Bạc</option>
                            <option value="Vàng">Vàng</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Xuất xứ:</label>
                        <select class="form-select" name="xuatxu" id="xuatxu">
                            <option value="Nhật Bản">Nhật Bản</option>
                            <option value="Hàn Quốc">Hàn Quốc</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-md-3">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tình trạng:</label>
                        <select class="form-select" name="tinhtrang" id="tinhtrang">
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class=" mb-3">
                        <label for="" class="form-label">Số lượng:</label>
                        <input type="number" class="form-control" name="amountt" id="amountt" placeholder="1" value="">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="mb-3">
                        <label class="form-label">Giá:</label>
                        <input type="number" class="form-control" name="prices" id="prices" placeholder="1" value="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-6 offset-md-3">
                    <a class="btn btn-secondary" href="./quanly_sanpham.php">Quay lại</a>
                    <button type="button" class="btn btn-primary" onclick="addproduct()">Thêm</button>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form> -->
    </div>
    <!-- Modal chi tiet san pham -->
    <!--  -->
    <script>
        function uploadd() {
            var s = document.getElementById("inputGroupFile02");
            var ss = s.value.replace(/C:\\fakepath\\/, '');
            document.getElementsByClassName("rounded")[0].src = "../picture/" + ss;
        }

        function addproduct() {
            var s = document.getElementById("inputGroupFile02");
            var ss = s.value.replace(/C:\\fakepath\\/, '');
            var s1 = document.getElementById('codez').value;
            var s2 = document.getElementById('namee').value;
            var s3 = document.getElementById('theloai').value;
            var s4 = document.getElementById('chatlieu').value;
            var s5 = document.getElementById('xuatxu').value;
            var s6 = document.getElementById('amountt').value;
            var s7 = document.getElementById('prices').value;
            var s8 = document.getElementById('tinhtrang').value;
            var s9 = document.getElementById('gioithieu').value;
            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc     
                    //if(confirm(this.responseText)) 
                    console.log(this.responseText);
                    if (confirm('Thêm sản phẩm ?')) {
                        if (this.responseText = 'success') {
                            alert('thành công');
                            location.reload();
                        } else {
                            alert('Lỗi khi thêm sản phẩm: \n' +
                                '- Trùng mã sản phẩm\n ' +
                                '- Trùng tên sản phẩm\n ' +
                                '- Số lượng, giá để âm hoặc trống\n ');
                        }
                    }
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/sanpham.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('add' +
                '&inputGroupFile02=' + ss +
                '&codez=' + s1 +
                "&namee=" + s2 +
                "&theloai=" + s3 +
                "&chatlieu=" + s4 +
                "&xuatxu=" + s5 +
                "&amountt=" + s6 +
                "&prices=" + s7 +
                "&tinhtrang=" + s8 +
                "&gioithieu=" + s9
            );
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>