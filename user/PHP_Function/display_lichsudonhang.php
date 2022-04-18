<?php
include('../../query.php');
session_start();
// if (isset($_POST['trangthai'])) {
//     $trangthai = isset($_POST['val']) ? $_POST['val'] : "";
//     if (empty($trangthai)) {
//         $sql = "SELECT * FROM hoadon LIMIT 0, 10";
//         $sql0 = "SELECT * FROM hoadon";
//     } else {
//         $sql = "SELECT * FROM hoadon WHERE statuss='{$trangthai}' LIMIT 0, 10";
//         $sql0 = "SELECT * FROM hoadon WHERE statuss='{$trangthai}'";
//     }
//     $s = array('arr1' => '', 'arr2' => '');
//     //die($sql);
//     $result = executeResult($sql);
//     $resul1t = countRow($sql0);
//     if ($resul1t > 0) {
//         foreach ($result as $row) {
//             $s['arr1'] .= '<tr>
//                 <th class="align-middle">
//                     <p class="mb-0">' . $row['id_hoadon'] . '</p>
//                 </th>
//                 <td class="align-middle">
//                     <p class="mb-0" style="font-weight: 500;">' . $row['ngaymua'] . '</p>
//                 </td>
//                 <td class="align-middle">
//                     <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_product']) . '</p>
//                 </td>
//                 <td class="align-middle">
//                     <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_money']) . '</p>
//                 </td>';
//             if ($row['statuss'] == 'Chờ xác nhận') {
//                 $s['arr1'] .= '<td class="align-middle">
//                                     <p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p>
//                                 </td>';
//             }
//             if ($row['statuss'] == 'Đã xác nhận') {
//                 $s['arr1'] .= '<td class="align-middle">
//                                     <p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p>
//                                 </td>';
//             }
//             if ($row['statuss'] == 'Đang giao') {
//                 $s['arr1'] .= '<td class="align-middle">
//                                     <p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p>
//                                 </td>';
//             }
//             if ($row['statuss'] == 'Đã hủy') {
//                 $s['arr1'] .= '<td class="align-middle">
//                                     <p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p>
//                                 </td>';
//             }
//             if ($row['statuss'] == 'Đã giao') {
//                 $s['arr1'] .= '<td class="align-middle">
//                                     <p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p>
//                                 </td>';
//             }
//             $s['arr1'] .= '<td class="align-middle">
//                     <a class="mb-0 btn btn-primary" href="./chitietdonhang_user.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
//                 </td>
//             </tr>';
//         }
//         for ($i = 0; $i < ceil($resul1t / 10); $i++) {
//             $s['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
//         }
//     } else {
//         $s['arr1'] = 'Không tìm thấy';
//         $s['arr2'] = '';
//     };
//     echo json_encode($s);
// }

if (isset($_POST['phantrang']) || isset($_POST['trangthai'])) {
    $page = isset($_POST['page']) ? $_POST['page']:1; // số trang
    $start = ($page - 1) * 10;
    $trangthai = $_POST['val'];
    if (empty($trangthai)) {
        $sql = "SELECT * FROM hoadon LIMIT $start, 10";
        $sql0 = "SELECT * FROM hoadon";
    } else {
        $sql = "SELECT * FROM hoadon WHERE statuss='{$trangthai}' LIMIT $start, 10";
        $sql0 = "SELECT * FROM hoadon WHERE statuss='{$trangthai}'";
    }
    $s = array('arr1' => '', 'arr2' => '');
    //die($sql);
    $result = executeResult($sql);
    $resul1t = countRow($sql0);
    if ($resul1t > 0) {
        foreach ($result as $row) {
            $s['arr1'] .= '<tr>
                <th class="align-middle">
                    <p class="mb-0">' . $row['id_hoadon'] . '</p>
                </th>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . $row['ngaymua'] . '</p>
                </td>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_product']) . '</p>
                </td>
                <td class="align-middle">
                    <p class="mb-0" style="font-weight: 500;">' . number_format($row['total_money']) . '</p>
                </td>';
            if ($row['statuss'] == 'Chờ xác nhận') {
                $s['arr1'] .= '<td class="align-middle">
                                    <p class="mb-0 text-secondary" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                </td>';
            }
            if ($row['statuss'] == 'Đã xác nhận') {
                $s['arr1'] .= '<td class="align-middle">
                                    <p class="mb-0 text-primary" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                </td>';
            }
            if ($row['statuss'] == 'Đang giao') {
                $s['arr1'] .= '<td class="align-middle">
                                    <p class="mb-0" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                </td>';
            }
            if ($row['statuss'] == 'Đã hủy') {
                $s['arr1'] .= '<td class="align-middle">
                                    <p class="mb-0 text-danger" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                </td>';
            }
            if ($row['statuss'] == 'Đã giao') {
                $s['arr1'] .= '<td class="align-middle">
                                    <p class="mb-0 text-success" style="font-weight: 500;">' . $row['statuss'] . '</p>
                                </td>';
            }
            $s['arr1'] .= '<td class="align-middle">
                    <a class="mb-0 btn btn-sm btn-primary" href="./chitietdonhang_user.php?id=' . $row['id_hoadon'] . '">Chi tiết</a>
                </td>
            </tr>';
        }
        for ($i = 0; $i < ceil($resul1t / 10); $i++) {
            $s['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang('.($i+1).', '.$_SESSION['iduser'].')">'.($i+1).'</a></li>';
        }
    } else {
        $s['arr1'] = 'Không tìm thấy';
        $s['arr2'] = '';
    };
    echo json_encode($s);
}

if(isset($_POST['huydon'])){
    $id_hoadon=$_POST['id_hoadon'];
    $sql="UPDATE hoadon SET statuss='Đã hủy' WHERE `id_hoadon`={$id_hoadon}";
    //die($sql);
    $result=execute($sql);
    if($result){
        echo 'success';
    }else echo 'fail';
}

?>
