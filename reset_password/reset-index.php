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

        h2 {
            margin-bottom: 0.5rem;
        }

        span {
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            margin-bottom: 0.5rem;
        }

        button {
            width: 100%;
            margin-bottom: 1rem;
        }

        form {
            width: 40%;
        }
    </style>
    <div class="a">
        <h2>Reset mật khẩu cho bố</h2>
        <span>1 email sẽ được gửi tới con mẹ mày với hướng dẫn cách đặt lại mật khẩu</span>
        <form action="reset-request.php" method="post">
            <input type="email" placeholder="Nhập email" name="email">
            <button name="reset-request-submit">Gửi mật khẩu mới qua mail</button>
        </form>
        <?php if (isset($_GET["reset"])) {
            if ($_GET["reset"] == "success") {
                echo "<p>Đã gửi email, kiểm tra đi con chó rách</p>";
            }
        } ?>
    </div>
</body>

</html>