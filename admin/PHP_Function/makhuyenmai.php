<?php
require_once('../../query.php');

chucnang();
function chucnang(){
    $action = $_POST['action'];
    $sql = "SELECT * FROM makhuyenmai";
    switch ($action) {
        case 'search';
            $val = $_POST['val'];
            if (!empty($val)) {
                $sql .= " WHERE id_khuyenmai='{$val}'";
            }
            display($sql);
            break;

        case 'phantrang':
            display($sql);
            break;

        case 'detail':
            $id = $_POST['id'];
            detail($id);
            break;

        case 'edit':
            edit();
            break;

        case 'deletedd':
            $id = $_POST['id'];
            deleted($id);
            break;

        case 'them':
            them();
            break;

        default:
            break;
    }
}

// hiện danh sách mã
function display($query){
    $s = array('arr1' => '', 'arr2' => '');
    $page = isset($_POST['page'])? $_POST['page']:1;
    $start = ($page - 1) * 10;
    $temp = $query;
    $query .= " LIMIT $start, 10";
    //die($query);
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result1 > 0) {
        foreach ($result as $row) {
            $s['arr1'] .= '<tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="' . $row["id_khuyenmai"] . '">
                    <span>' . ++$start . '</span>
                </div>
            </th>
            <td>
                <span>' . $row["id_khuyenmai"] . '</span>
            </td>
            <td>' . ($row["trangthai"] == 1 ? 'Còn hạn' : 'Hết hạn') . '</td>
            <td>' . number_format($row["giamgia"]) . '</td>
            <td>' . date("d-m-Y H:i:s", strtotime($row["ngayhethan"])) . '</td>
            <td>
                <button type="button" id="btn' . $row["id_khuyenmai"] . '" value="' . $row["id_khuyenmai"] . '" class="btn btn-outline-primary btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
                <button class="btn btn-danger btn-sm" name="xoa"  onclick="deletepromo(`' . $row["id_khuyenmai"] . '`)">X</button>
            </td>
        </tr>';
        }
        for ($i = 0; $i < ceil($result1 / 10); $i++) {
            if($i==$page-1){
                $s['arr2'] .= '<button type="button" class="btn btn-outline-secondary active" onclick="phantrang(' . ($i + 1) . ', this)">' . ($i + 1) . '</button>';
            }else $s['arr2'] .= '<button type="button" class="btn btn-outline-secondary" onclick="phantrang(' . ($i + 1) . ', this)">' . ($i + 1) . '</button>';
        }
    } else {
        $s['arr1'] = '<td colspan="6">Không tìm thấy</td>';
        $s['arr2'] = '';
    }
    echo json_encode($s);
}
// hiện chi tiết mã
function detail($id)
{
    $sql = "SELECT * FROM makhuyenmai WHERE id_khuyenmai='{$id}'";
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
                    <input type="date" class="form-control" placeholder="Ngày hết hạn" id="ngayhethan" value="' . $result['ngayhethan'] . '">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giảm giá:</label>
                    <input type="number" class="form-control" placeholder="Giá giảm" id="giamgia" value="' . $result['giamgia'] . '">
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" value="' . $result["id_khuyenmai"] . '" class="btn btn-primary" onclick="editpromo(this.value)">Sửa</button>
        </div>
    </div>';
}
// chỉnh sửa mã
function edit()
{
    $khuyenmai = $_POST['khuyenmai'];
    $trangthai = $_POST['trangthai'];
    $ngayhethan = $_POST['ngayhethan'];
    $giagiam = $_POST['giamgia'];
    $sql = "UPDATE makhuyenmai SET trangthai='$trangthai', ngayhethan='$ngayhethan', giamgia='$giagiam' WHERE id_khuyenmai='{$khuyenmai}'";
    $result = execute($sql);
    if ($result) {
        echo 'success';
    } else echo 'fail';
}
// xóa 1 mã
function deleted($id)
{
    $id_khuyenmai = $id;
    $sql = "DELETE FROM makhuyenmai WHERE id_khuyenmai='$id_khuyenmai'";
    //die($sql);
    if (execute($sql)) {
        echo 'success';
    } else echo 'fail';
}
// thêm 1 mã
function them(){
    $khuyenmai = $_POST['khuyenmai'];
    $trangthai = $_POST['trangthai'];
    $ngayhethan = $_POST['ngayhethan'];
    $giagiam = $_POST['giagiam'];

    $sql = "INSERT INTO `makhuyenmai`(`id_khuyenmai`, `trangthai`, `ngayhethan`, `giamgia`) 
    VALUES ('$khuyenmai','$trangthai','$ngayhethan','$giagiam')";

    $result = execute($sql);

    if ($result) {
        echo 'success';
    } else echo 'fail';
}

// function load()
// {
    // $page = isset($_POST['page']) ? $_POST['page'] : 1;
    // $start = ($page - 1) * 10;
    //$sql = "SELECT * FROM makhuyenmai LIMIT $start, 10";
    // $sql = "SELECT * FROM makhuyenmai";
    // $result = executeResult($sql);
    //     foreach ($result as $row) {
    //         echo '<tr>
    //     <th scope="row">
    //         <div class="form-check">
    //             <input class="form-check-input" type="checkbox" value="' . $row["id_khuyenmai"] . '">
    //             <span>' . ++$start . '</span>
    //         </div>
    //     </th>
    //     <td>
    //         <span>' . $row["id_khuyenmai"] . '</span>
    //     </td>
    //     <td>' . $row["trangthai"] . '</td>
    //     <td>' . number_format($row["giamgia"]) . '</td>
    //     <td>' .  date("d-m-Y H:i:s", strtotime($row["ngayhethan"])) . '</td>
    //     <td>
    //         <button type="button" id="btn' . $row["id_khuyenmai"] . '" value="' . $row["id_khuyenmai"] . '" class="btn btn-outline-primary btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
    //         <button class="btn btn-danger btn-sm" name="xoa"  onclick="deleteproduct(866)">X</button>
    //     </td>
    // </tr>';
    //     }
// }


