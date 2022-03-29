<?php $vnp_TmnCode = "Y4U88XFK"; //Mã website tại VNPAY 
$vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV"; //Chuỗi bí mật
$vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/projects/QuanLyVeMayBay/vnpay_php/vnpay_return.php";

function AddOrder($order)
{
    $Connect = connection();
    $OrderID = $order["OrderID"];
    $StartFlight = $order["StartFlight"];
    $Quantity = $order["Quantity"];
    $TotalPrice = $order["TotalPrice"];
    $State  = $order["State"];
    $EmployeeID = $order["EmployeeID"];
    $OrderDate = $order["OrderDate"];
    $MemberID = $order["MemberID"];
    $ContactEmail = $order["ContactEmail"];
    $ContactName = $order["ContactName"];
    $Address = $order["Address"];
    $TotalWeight = $order["TotalWeight"];
    $StartDate = $order["StartDate"];
    $ReturnDate = $order["ReturnDate"];
    $ReturnFlight = $order["ReturnFlight"];
    if ($ReturnDate == '') {
        $sql = "INSERT INTO orders(OrderID,StartDate,StartFlight,Quantity,TotalPrice,State,EmployeeID,OrderDate,MemberID,ContactEmail,ContactName,Address,TotalWeight) 
        VALUES('" . $OrderID . "','" . $StartDate . "','" . $StartFlight . "','" . $Quantity . "','" . $TotalPrice . "','" . $State . "',$EmployeeID,'" . $OrderDate . "','" . $MemberID . "','" . $ContactEmail . "',
        '" . $ContactName . "','" . $Address . "','" . $TotalWeight . "')";
    } else {
        $sql  = "INSERT INTO orders(OrderID,StartDate,ReturnDate,StartFlight,Quantity,TotalPrice,State,EmployeeID,OrderDate,MemberID,ContactEmail,ContactName,Address,TotalWeight,ReturnFlight) 
        VALUES('" . $OrderID . "','" . $StartDate . "','" . $ReturnDate . "','" . $StartFlight . "','" . $Quantity . "','" . $TotalPrice . "','" . $State . "',$EmployeeID,'" . $OrderDate . "','" . $MemberID . "','" . $ContactEmail . "',
        '" . $ContactName . "','" . $Address . "','" . $TotalWeight . "','" . $ReturnFlight . "')";
    }
    $query = mysqli_query($Connect, $sql);
    $Connect->close();
    return $query;
}

function AddOrderDetails($orderdetails)
{
    $connect = connection();
    foreach ($orderdetails as $detail) {
        $OrderID = $detail["OrderID"];
        $TicketID = $detail["TicketID"];
        $PassengerName = $detail["PassengerName"];
        $Age = $detail["Age"];
        $TicketPrice = $detail["TicketPrice"];
        $BaggageID = $detail["BaggageID"];
        $SeatCode = $detail["SeatCode"];
        $Class = $detail["Class"];
        $Type = $detail["Type"];
        mysqli_query($connect, "UPDATE ticket SET State = 'Occupied' WHERE TicketID = '" . $TicketID . "'");
        $query = mysqli_query($connect, "INSERT INTO orderdetails(OrderID,TicketID,PassengerName,Age,TicketPrice,SeatCode,Class,Type,BaggageID) 
            VALUES('" . $OrderID . "','" . $TicketID . "','" . $PassengerName . "','" . $Age . "','" . $TicketPrice . "','" . $SeatCode . "',
            '" . $Class . "','" . $Type . "',$BaggageID)");
    }
    $connect->close();
    return $query;
}

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
