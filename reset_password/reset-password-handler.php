<?php require_once("../query.php");
if (isset($_POST["reset-password-submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $retypexPassword = $_POST["retype_password"];
    if (empty($password) || empty($retypexPassword)) {
        header("location: ./create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=emptyfields");
    } else if ($password !== $retypexPassword) {
        header("location: ./create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&error=notmatch");
    } else {
        $currentDate = date("U");
        $result = executeResult("select * from resetpassword where ResetSelector = '$selector'")[0];
        if ($result["ResetExpire"] < $currentDate) {
            header("Location: ../user/login_user.php?reset=expired");
        } else {
            $CheckToken = password_verify(hex2bin($validator), $result["ResetToken"]);
            if ($CheckToken == true) {
                $email = $result["ResetEmail"];
                execute("update taikhoan set password = '$password' where Email = '$email'");
                execute("delete from resetpassword where ResetEmail = '$email'");
                header("Location: ../user/login_user.php?reset=success");
            } else {
                header("Location: ../user/login_user.php?reset=wrongtoken");
            }
        }
    }
} else {
    header("location: ./index.php");
}
