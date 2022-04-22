<?php
require_once("../../query.php");
session_start();

chucnang();
function chucnang(){
    $action = $_POST['action'];
    $id_user = $_SESSION['iduser'];
    $sql="SELECT * from makhuyenmai where id_user='$id_user'";
    switch ($action) {
        case 'search':
            $val = $_POST['val'];
            if (empty($val)) {
                $sql = $sql;
            } else $sql .= " and id_khuyenmai='$val'";
            display($sql, 0);
            break;

        case 'phantrang':
            $page = $_POST['page'];
            $start = ($page - 1) * 10;
            display($sql, $start);
            break;

        default:
    }
}

function display($query, $start){
    $s = array('arr1' => '', 'arr2' => '');
    $temp = $query;
    $query .= " LIMIT $start, 10";
    //die($query);
    $result = executeResult($query);
    $result1 = countRow($temp);
    if ($result) {
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
            <td>' . number_format($row["giamgia"]) . '</td>
            <td>' . $row["ngayhethan"] . '</td>
            <td>  
                <button type="button" id="btn' . $row["id_khuyenmai"] . '" value="' . $row["id_khuyenmai"] . '" class="btn btn-outline-info btn-sm"  onclick="detail(this.value)" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button>
            </td>
        </tr>';
        }
        for ($i = 0; $i < ceil($result1 / 10); $i++) {
            if($i==$_POST['page']-1){
                $s['arr2'] .= '<li class="page-item active"><a class="page-link" onclick="phantrang('.($i + 1).', '.$_SESSION['iduser'].')">' . ($i + 1) . '</a></li>';
            }else $s['arr2'] .= '<li class="page-item"><a class="page-link" onclick="phantrang('.($i + 1).', '.$_SESSION['iduser'].')">' . ($i + 1) . '</a></li>';
            
        }
    } else {
        $s['arr1'] .= '<td colspan="5">Không tìm thấy</td>';
        $s['arr2'] .= '';
    }
    echo json_encode($s);
}

