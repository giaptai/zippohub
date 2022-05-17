<?php $vnp_TmnCode = "Y4U88XFK"; //Mã website tại VNPAY 
$vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV"; //Chuỗi bí mật
$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$a = explode("/", $_SERVER["SCRIPT_FILENAME"]);
$string = '';
for ($i = 3; $i < sizeof($a) - 1; $i++) {
    $string .= $a[$i] . "/";
}
$vnp_Returnurl = "http://localhost/" . $string . "vnpay_return.php";