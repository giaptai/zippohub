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
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./quanly_makhuyenmai.php">Quay lại Quản lý mã khuyến mãi</a>
        </li>
    </ul>

    <!-- Them tai khoan -->
    <div class="container mt-4">
        <div class="col-6 m-auto">
            <h3>Thêm mã khuyến mãi</h3>
            <form class="form-floating" enctype="multipart/form-data" method="POST">
                <!-- Name input -->
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mã khuyến mãi:</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Mã khuyến mãi" id="khuyenmai">
                        <button class="btn btn-outline-secondary" type="button" onclick="console.log(this.parentNode.querySelector('input[type=text]').value=(Math.random() +1).toString(36).substring(2))">Tạo mã</button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Trạng thái:</label>
                    <select class="form-select" id="trangthai">
                        <option value="1">Còn hạn</option>
                        <option value="0">Hết hạn</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ngày hết hạn:</label>
                    <input type="date" class="form-control" placeholder="Ngày hết hạn" id="ngayhethan">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giá giảm:</label>
                    <input type="number" class="form-control" placeholder="Giá giảm" id="giagiam">
                </div>

            </form>
        </div>

        <div class="col-6 m-auto">
            <a type="button" class="btn btn-secondary" href="./quanly_makhuyenmai.php">Quay lại</a>
            <button type="button" class="btn btn-primary" onclick="addPromo()">Thêm</button>
        </div>
    </div>

    <!-- Modal chi tiet san pham -->
    <!--  -->
    <script>
        function addPromo() {
            var s1 = document.getElementById('khuyenmai').value;
            var s2 = document.getElementById('trangthai').value;
            var s3 = document.getElementById('ngayhethan').value;
            var s4 = document.getElementById('giagiam').value;
            console.log(s1, s2, s3, s4);
            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc     
                    alert(this.responseText);
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/makhuyenmai.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=them' +
                "&khuyenmai=" + s1 +
                '&trangthai=' + s2 +
                "&ngayhethan=" + s3 +
                "&giagiam=" + s4
            );
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>