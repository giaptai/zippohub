<?php require_once("../query.php");
if (isset($_POST["reset-request-submit"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://localhost/zippohub/reset_password/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expire_in = date("U") + 300;
    execute("delete from resetpassword where ResetEmail = '" . $_POST["email"] . "'");
    execute("INSERT INTO resetpassword(ResetEmail, ResetSelector, ResetToken, ResetExpire) values ('" . $_POST["email"] . "','$selector','" . password_hash($token, PASSWORD_DEFAULT) . "','$expire_in')");
    $subject = "Reset your password for ZippoHub";
    $message = '
    <table style="margin-bottom: 1rem;">
    <thead>
        <tr>
            <th><img style="width: 3.5rem; margin-right: 1rem;"
                    src="https://cdn.vectorstock.com/i/1000x1000/30/91/icon-of-zippo-lighter-flat-style-vector-4763091.webp">
            </th>
            <th>
                <span
                    style="font-weight: bold; font-style: italic; color: blueviolet; font-size: 1.5rem;">ZippoHub</span>
            </th>
        </tr>
    </thead>
    </table>
    <div style="color: rgb(80, 154, 233);">
        <p>We received a password reset request. The link to reset your password is below.</p>
        <p>Here is your password reset link: <a href=' . $url . '>' . $url . '</a></p>
    </div>';
    require_once("../PHPMailer/PHPMailerAutoload.php");
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->isHTML();
    $mail->Username = "starbutterfly652@gmail.com";
    $mail->Password = "galadon2001";
    $mail->setFrom("no-reply@zippohub.com");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->addAddress($_POST["email"]);
    $mail->send();
    header("Location: ./reset-index.php?reset=success");
}
