<?php require_once('../../query.php');
$id = $_POST["id_address"];
$sql = execute("delete from diachikhach where id_addr = {$id}");
if ($sql) {
    echo "thanh cong book";
} else {
    echo "em dep lam";
}
