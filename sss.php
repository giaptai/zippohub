<div class="container">
        <h1 style="text-align: center; color: red; font-style: italic;" class="pt-4">Chi tiết sản phẩm</h1>
        <div class="row justify-content-md-evenly mb-5">
            <div class="col-md-auto mb-5">
                <div class="text-center mb-3 border"> <img id="main-image" src="../picture/49532_Z-SP-Lighter_49352_MAIN_1024x1024-400x400.jpg" width="300" /> </div>
                <div class="thumbnail text-center pt-2">
                    <img class="border" onclick="change_image(this)" src="../picture/49600_Z-SP-Lighter_49146_MAIN_1024x1024.jpg" width="100">
                    <img class="border" onclick="change_image(this)" src="../picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" width="100">
                    <img class="border" onclick="change_image(this)" src="../picture/72a06bc6099de1f2d17fb96ac417128116dae6a0_1024x1024-400x400.jpg" width="100">
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="product p-1">
                    <div class="mb-2">
                        <h2 class="fw-bolder"><?= $result['name'] ?></h2>
                        <h4 class="text-danger fw-bolder"><?= number_format($result['price']) ?> VND</h4>
                        <p class="mb-2">Mã sản phẩm: <span class="fw-bold"><?= $result['id'] ?><span></p>
                        <ul class="">
                            <li>
                                <p class="m-0">Tình trạng: <span class="fw-bold"><?= $result['state'] == 1 ? 'Còn hàng' : 'Hết hàng' ?></span></p>
                            </li>
                            <li>
                                <p class="m-0">Thương hiệu: <span class="fw-bold"><?= $result['category'] ?></span></p>
                            </li>
                            <li>
                                <p class="m-0">Chất liệu: <span class="fw-bold"><?= $result['material'] ?></span></p>
                            </li>
                            <li>
                                <p class="m-0">Xuất xứ: <span class="fw-bold"><?= $result['madeby'] ?></span></p>
                            </li>
                        </ul>
                        <!-- <p class="m-0">Tình trạng: <span class="fw-bold">Còn hàng</span>̀</p>
                        <p class="m-0">Thương hiệu: <span class="fw-bold">Zippo Armor</span>̀</p>
                        <p class="m-0">Chất liệu: <span class="fw-bold">Đồng</span>̀</p>
                        <p class="m-0">Xuất xứ: <span class="fw-bold">Nhật Bản</span>̀</p> -->
                    </div>
                    <hr class="bg-dark border-dark">
                    <div class="">
                        <h5 class="fw-bolder">GIỚI THIỆU: </h5>
                        <span class="fs-6">Zippo Mèo Khắc Nổi 3D Tuổi Mẹo Tuổi Mão màu vàng chất liệu đồng nguyên khối.
                            Khắc nổi hiệu ứng 3D cao cấp bền, đẹp, không phai.
                            Mẫu Zippo độc quyền chỉ có tại ZippoStore.vn hợp làm quà cho bạn trai, bạn bè, anh trai, chú bác, bố, người yêu, sếp nam tuổi mèo, tuổi mẹo, tuổi mão.
                        </span>
                    </div>
                    <hr class="bg-dark border-dark">
                    <div class="col-12">
                        <?php
                        if (!isset($_SESSION["cart"][$result['id']])) {
                            echo '<button class="btn btn-primary btn-lg" onclick="buyproduct(' . $result['id'] . ')" id="id' . $result['id'] . '">Mua sản phẩm</button>';
                        } else {
                            echo '<button class="btn btn-primary btn-lg disabled" onclick="buyproduct(' . $result['id'] . ')" id="id' . $result['id'] . '">Đã thêm vào giỏ</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    