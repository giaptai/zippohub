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

<body style="background-color: #508bfc;">
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-3">Admin</h3>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Tên đăng nhập</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput2" placeholder="name@example.com">
                                <label for="floatingInput">Mật khẩu</label>
                            </div>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Trang ZippoHub <a href="../index.php" class="link-primary">Chuyển tới</a></p>
                            <hr class="my-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="login()">Login</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    function login() {
        s1 = document.getElementById('floatingInput').value;
        s2 = document.getElementById('floatingInput2').value;
        if (s1 == 'admin' && s2 == 'admin') {
            window.location.href = "./quanly_thongke.php";
        } else {
            alert('Sai thông tin');
            return;
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>