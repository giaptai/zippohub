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
            <a class="nav-link active" href="./quanly_taikhoan.php">Quay lại Quản lý tài khoản</a>
        </li>
    </ul>
    <!--  -->

    <!-- Modal Them tai khoan -->
    <div class="container mt-4">
        <div class="col-6 m-auto">
            <h4>Thêm tài khoản</h4>
            <form class="form-floating" enctype="multipart/form-data" method="POST">
                <!-- Name input -->
                <div class="form-floating mb-4">
                    <input type="text" id="namee" class="form-control" placeholder="1" name="namee" value="">
                    <label class="form-label" for="floatingInput">Họ và tên</label>
                </div>
                <!-- Email input -->
                <div class="form-floating mb-4">
                    <input type="email" id="emaill" class="form-control" placeholder="1" name="emaill" value="">
                    <label class="form-label" for="form5Example2">Email</label>
                    <div id="" class="form-text">
                        Hợp lệ: _, a-z, A-Z, 0-9; Định dạng: example@gmail.com
                    </div>
                </div>
                <!-- Email input -->
                <div class="form-floating mb-4">
                    <input type="password" id="passwordd" class="form-control" placeholder="1" name="passwordd" value="" aria-describedby="passwordHelpBlock">
                    <label class="form-label" for="form5Example2">Mật khẩu</label>
                    <div id="passwordHelpBlock" class="form-text">
                        Độ dài từ 3 đến 20,  Hợp lệ: a-z, A-Z, 0-9
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <input type="tel" id="phonee" class="form-control" placeholder="1" name="phonee" value="">
                    <label class="form-label" for="form5Example2">Số điện thoại</label>
                    <div id="" class="form-text">
                        Hợp lệ: 0-9; Độ dài 10-11
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" id="addresss" rows="10" placeholder="1" name="addresss"></textarea>
                    <label class="form-label" for="floatingInput">Địa chỉ</label>
                </div>

            </form>
        </div>

        <div class="col-6 m-auto">
            <a type="button" class="btn btn-secondary" href="./quanly_taikhoan.php">Quay lại</a>
            <button type="button" class="btn btn-primary" onclick="addCus()">Thêm</button>
        </div>
    </div>

    <!-- Modal chi tiet san pham -->
    <!--  -->
    <script>
        function addCus() {

            var s1 = document.getElementById('namee').value;
            var s2 = document.getElementById('emaill').value;
            var s3 = document.getElementById('passwordd').value;
            var s4 = document.getElementById('phonee').value;
            var s5 = document.getElementById('addresss').value

            //Khoi tao doi tuong
            var xhttp = new XMLHttpRequest() || ActiveXObject();
            //Bat su kien thay doi trang thai cuar request
            xhttp.onreadystatechange = function() {
                //Kiem tra neu nhu da gui request thanh cong
                if (this.readyState == 4 && this.status == 200) {
                    //In ra data nhan duoc     
                    if (this.responseText == 'fail') {
                        alert('Xảy ra lỗi khi thêm, có thể do:\n' +
                            '1. Số điện thoại trùng hoặc không hợp lệ.\n' +
                            '2. Email trùng hoặc không hợp lệ,\n' +
                            '3. Mật khẩu không hợp lệ.');
                    } else alert(this.responseText);
                    //location.reload();
                }
            }
            //cau hinh request
            xhttp.open('POST', './PHP_Function/taikhoan.php', true);
            //cau hinh header cho request
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //gui request
            xhttp.send('action=them' +
                "&namee=" + s1 +
                '&emaill=' + s2 +
                "&passwordd=" + s3 +
                "&phonee=" + s4 +
                "&addresss=" + s5
            );
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>