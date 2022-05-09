<?php require_once('../../query.php');

$id = $_POST["id_address"];
$check= executeSingleResult("select * from diachikhach where id_addr = '{$id}'");
//die("select * from diachikhach where id_addr = $id");
if($check['loai']==1){
    echo 'fail';
    die();
}else {
    $sql = execute("delete from diachikhach where id_addr = {$id}");
    echo 'success';
}

