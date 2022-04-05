<?php $vnp_TmnCode = "Y4U88XFK"; //Mã website tại VNPAY 
$vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV"; //Chuỗi bí mật
$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/projects/zippohub/vnpay_php/vnpay_return.php";
function AddPayment($PaymentArr)
{
    $connect = connection();
    $OrderID = $PaymentArr["OrderID"];
    $Total = $PaymentArr["Total"];
    $Note = $PaymentArr["Note"];
    $vnp_response_code = $PaymentArr["vnp_response_code"];
    $code_vnpay = $PaymentArr["code_vnpay"];
    $BankCode = $PaymentArr["BankCode"];
    $PaymentTime = $PaymentArr["PaymentTime"];
    $query = mysqli_query($connect, "INSERT INTO `payments`(`OrderID`, `Total`, `Note`, `vnp_response_code`, `code_vnpay`, `BankCode`, `PaymentTime`) 
        VALUES ('" . $OrderID . "','" . $Total . "','" . $Note . "','" . $vnp_response_code . "','" . $code_vnpay . "','" . $BankCode . "','" . $PaymentTime . "')");
    $connect->close();
    return $query;
}
