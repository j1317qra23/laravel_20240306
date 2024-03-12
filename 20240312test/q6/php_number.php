<!DOCTYPE html>
<html>

<head>
    <title>Number Processor</title>
</head>

<body>
    <form method="post" action="">
        <label for="number">輸入數字：</label>
        <input type="text" name="number" id="number" required>
        <input type="submit" value="送出">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 檢查是否有提交表單
        $userInput = $_POST["number"];

        // 檢查輸入是否為數字
        if (is_numeric($userInput)) {
            // 結果 1: 秀出四捨五入的結果
            $roundedResult = round($userInput);
            echo "<p>結果 1: 秀出四捨五入的結果： $roundedResult</p>";

            // 結果 2: 秀出千分位分隔符號
            $formattedResult = number_format($userInput);
            echo "<p>結果 2: 秀出千分位分隔符號： $formattedResult</p>";
        } else {
            // 如果輸入不是數字，顯示警告訊息
            echo "<script>alert('僅可以輸入數字');</script>";
        }
    }
    ?>

</body>

</html>