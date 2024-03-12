<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Parser</title>
</head>

<body>
    <form action="" method="post">
        <label for="emial">輸入 Emai:</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="送出">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 檢查是否有提交表單
        $email = $_POST["email"];

        $at_position = strpos($email, "@");

        if ($at_position !== false) {
            // 如果找到 "@"，則取得 "@" 前的字串
            $username = substr($email, 0, $at_position);
            echo "<p>EMAIL@前的字串： $username</p>";
        } else {
            // 如果找不到 "@"，顯示錯誤訊息
            echo "<p>請輸入有效的 Email 地址</p>";
        }
    }
    ?>
</body>

</html>