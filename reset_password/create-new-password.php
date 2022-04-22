<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .a {
            background-color: aliceblue;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            width: 70%;
            margin: 1rem auto;
        }

        form {
            width: 100%;
        }

        input {
            width: 100%;
            margin-bottom: 0.5rem;
        }

        button {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    </style>
    <?php $selector = $_GET["selector"];
    $validator = $_GET["validator"];
    if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
    } else {
        if (ctype_xdigit($selector) == true && ctype_xdigit($validator) == true) { ?>
            <div class="a">
                <form action="reset-password-handler.php" method="post">
                    <input hidden name="selector" type="text" value="<?php echo $selector ?>">
                    <input hidden name="validator" type="text" value="<?php echo    $validator ?>">
                    <input name="password" type="password">
                    <input name="retype_password" type="password">
                    <button name="reset-password-submit">Reset mật khẩu</button>
                </form>
                <?php if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                        echo "<p>Vui lòng điền đủ mật khẩu con chó rách</p>";
                    } else {
                        echo "<p>Mật khẩu đéo trùng kìa con chó rách</p>";
                    }
                } ?>
            </div>
    <?php
        }
    } ?>
</body>

</html>