<?php
require_once('../../query.php');

if(isset($_POST['them'])){
    $khuyenmai=$_POST['khuyenmai'];
    $trangthai=$_POST['trangthai'];
    $ngayhethan=$_POST['ngayhethan'];
    $giagiam=$_POST['giagiam'];

    $sql="INSERT INTO `makhuyenmai`(`id_khuyenmai`, `trangthai`, `ngayhethan`, `giamgia`) 
    VALUES ('$khuyenmai','$trangthai','$ngayhethan','$giagiam')";

    $result=execute($sql);

    if($result){
        echo 'success';
    }else echo 'fail';
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM makhuyenmai WHERE id_khuyenmai='{$id}'";
    //die($sql);
    $result = executeSingleResult($sql);
    echo '
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Chi tiết mã khuyến mãi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
        <form class="form-floating" enctype="multipart/form-data" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mã khuyến mãi:</label>
                    <input type="text" class="form-control" placeholder="Mã khuyến mãi" id="khuyenmai" disabled value="' . $result['id_khuyenmai'] . '">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Trạng thái:</label>
                    <select class="form-select" id="trangthai">
                        <option value="1" ' . (($result['trangthai'] == 1) ? 'selected' : "") . '>Còn hạn</option>
                        <option value="0" ' . (($result['trangthai'] == 0) ? 'selected' : "") . '>Hết hạn</option>
                    </select>
                </div>
            
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ngày hết hạn:</label>
                    <input type="date" class="form-control" placeholder="Ngày hết hạn" id="ngayhethan" value="'.$result['ngayhethan'].'">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giảm giá:</label>
                    <input type="number" class="form-control" placeholder="Giá giảm" id="giamgia" value="'.$result['giamgia'].'">
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" value="' . $result["id_khuyenmai"] . '" class="btn btn-primary" onclick="editpromo(this.value)">Sửa</button>
        </div>
    </div>';
}

if(isset($_POST['edit'])){
    $khuyenmai=$_POST['khuyenmai'];
    $trangthai=$_POST['trangthai'];
    $ngayhethan=$_POST['ngayhethan'];
    $giagiam=$_POST['giamgia'];

    $sql="UPDATE makhuyenmai SET trangthai='$trangthai', ngayhethan='$ngayhethan', giamgia='$giagiam' WHERE id_khuyenmai='{$khuyenmai}'";

    $result=execute($sql);

    if($result){
        echo 'success';
    }else echo 'fail';
}

if(isset($_POST['search'])){
    $val= $_POST['val'];
    if(empty($val)){
        $sql="SELECT * FROM makhuyenmai";
    }else $sql="SELECT * FROM makhuyenmai  WHERE id_khuyenmai='{$val}'";
    //die($sql);
    if(countRow($sql)){
        $result=executeResult($sql);
        foreach($result as $row){
            echo '<tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $row["id_khuyenmai"] . '">
                    <span>1</span>
                </div>
            </th>
            <td>
                <span>' . $row["id_khuyenmai"] . '</span>
            </td>
            <td>' . $row["trangthai"] . '</td>
            <td>' . number_format($row["giamgia"]) . '</td>
            <td>' . $row["ngayhethan"] . '</td>
            <td>
                <button type="button" id="btn' . $row["id_khuyenmai"] . '" value="' . $row["id_khuyenmai"] . '" class="btn btn-outline-primary btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
                <button class="btn btn-danger btn-sm" name="xoa"  onclick="deleteproduct(866)">X</button>
            </td>
        </tr>';
        }
    }else echo 'Không tìm thấy';
}

if(isset($_GET['page'])){
    $page= $_GET['page'];
    $start=($page-1)*10;
    if(empty($val)){
        $sql="SELECT * FROM makhuyenmai limit $start, 10";
    }else $sql="SELECT * FROM makhuyenmai  WHERE id_khuyenmai='{$val}' limit $start, 10";
    //die($sql);
    $result=executeResult($sql);
    foreach($result as $row){
        echo '<tr>
        <th scope="row">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="' . $row["id_khuyenmai"] . '">
                <span>1</span>
            </div>
        </th>
        <td>
            <span>' . $row["id_khuyenmai"] . '</span>
        </td>
        <td>' . $row["trangthai"] . '</td>
        <td>' . number_format($row["giamgia"]) . '</td>
        <td>' . $row["ngayhethan"] . '</td>
        <td>
            <button type="button" id="btn' . $row["id_khuyenmai"] . '" value="' . $row["id_khuyenmai"] . '" class="btn btn-outline-primary btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
            <button class="btn btn-danger btn-sm" name="xoa"  onclick="deleteproduct(866)">X</button>
        </td>
    </tr>';
    }
}
?>
