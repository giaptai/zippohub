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
        <li class="nav-item bg-light">
            <a class="nav-link active" aria-current="page" href="quanly_makhuyenmai.php">Quản lý ma khuyen mai</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./quanly_donhang.php">Quản lý đơn hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_sanpham.php">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./quanly_taikhoan.php">Quản lý tài khoản</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active " href="#">Thống kê</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Tài khoản</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
        </li>
    </ul>
    <!--  -->
    <div class="d-block m-auto" style="width: 90%;">

        <table class="table align-middle caption-top">
            <caption>
                Thống kê
            </caption>
            <thead>
                <tr>
                    <th scope="col" style="width:8%">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label>Tất cả</label>
                    </th>
                    <th scope="col" style="width:25%">Sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" style="width:20%">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <td>
                        <img src="../picture/49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg" width="auto" height="100">
                        <span>Zippo Hacker vipo</span>
                    </td>
                    <td>25</td>
                    <td>1.000.000</td>
                    <td>
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Trạng thái
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Còn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Hết hàng</a></li>
                        </ul>
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm">Cập nhật</button>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                        <button class="btn btn-info btn-sm">Chi tiết</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                    </th>
                    <td>
                        <img src="../picture/49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg" width="auto" height="100">
                        <span>Zippo Hacker vipo</span>
                    </td>
                    <td>25</td>
                    <td>1.000.000</td>
                    <td>
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Trạng thái
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Còn hàng</a></li>
                            <li><a class="dropdown-item" href="#">Hết hàng</a></li>
                        </ul>
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm">Cập nhật</button>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                        <button class="btn btn-info btn-sm">Chi tiết</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <td colspan="6" style="text-align:center">
                    <div class="align-items-center btn-group btn-group-sm" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-secondary">1</button>
                        <button type="button" class="btn btn-outline-secondary">2</button>
                        <button type="button" class="btn btn-outline-secondary">3</button>
                        <button type="button" class="btn btn-outline-secondary">4</button>
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>