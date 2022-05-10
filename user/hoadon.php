<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

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
    <?php
        require_once('../query.php');
        if (isset($_GET['id'])){
            $id=$_GET['id'];
            $result=executeSingleResult("SELECT * FROM `hoadon` WHERE id_hoadon=$id");

            $sql = "SELECT sanpham.img as img, sanpham.name as name ,sanpham.price as price , chitiethoadon.amount as amount, chitiethoadon.total as total
            FROM chitiethoadon INNER JOIN hoadon on chitiethoadon.id_hoadon=hoadon.id_hoadon AND hoadon.id_hoadon=$id
            INNER JOIN sanpham on chitiethoadon.id_sanpham=sanpham.id";
            
            $result1=executeResult($sql);

        }
    ?>
    <!-- <div class="container"> -->
    <div class="carddd">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Hóa đơn >> <strong> #<?=$result['id_hoadon']?></strong></p>
                    </div>

                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <p class="pt-0 fa-3x" style="color:#5d9fc5 ;">Hóa đơn</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text">Khách hàng: <span class="fw-bold"><?=$result['fullname']?></span></li>
                                <li class="text">Địa chỉ: <span class="fw-bold"><?=$result['address']?></span></li>
                                <li class="text">Số điện thoại: <span class="fw-bold"><?=$result['phone']?></span></li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted m-0">Hóa đơn</p>
                            <ul class="list-unstyled">
                                <li class="text"><i class="fas fa-circle"></i> <span class="fw-bold">ID:</span>#<?=$result['id_hoadon']?></li>
                                <li class="text"><i class="fas fa-circle"></i> <span class="fw-bold">Ngày đặt: </span><?=date("d-m-Y H:i:s", strtotime($result['ngaymua'])) ?></li>
                                <li class="text"><i class="fas fa-circle"></i> <span class="me-1 fw-bold">Trạng thái:</span><span class="badge fs-6 text-dark fw-bold">
                                <?=$result['statuss']?></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-borderless">
                            <thead class="text-dark">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=0;
                                    foreach ($result1 as $row) {
                                        echo '<tr>
                                        <th scope="row">'.++$count.'</th>
                                        <td>'.$row['name'].'</td>
                                        <td>' . number_format($row['amount']) . '</td>
                                        <td>' . number_format($row['price']) . '</td>
                                        <td>' . number_format($row['total']) . '</td>
                                    </tr>';
                                    }
                                
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <p class="text-black float-start"><span class="text-black me-3"> Tổng tiền:</span><span style="font-size: 25px;"><?=number_format($result['total_money'])?> VNĐ</span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-3 float-end">
                            <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark" onclick="window.print()"><i class="fas fa-print text-primary"></i> In hóa đơn</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <script src="https://kit.fontawesome.com/18b3e0af24.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>