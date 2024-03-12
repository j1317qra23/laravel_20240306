<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Search</title>
</head>

<body>
    <h1 style="color:red">Array Search</h1>

    <form method="post">
        <label for="searchNumber">請輸入數字：</label>
        <input type="text" name="searchNumber" id="searchNumber" required>
        <button type="submit">送出</button>
    </form>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <?php
    $data = array(
        "A01KA029", "A02KA032", "A03KA028", "A01KA029001",
        "A01KA029002", "A01KA029003", "A01KA029004", "A01KA029005",
        "A02KA032001", "A02KA032002", "A02KA032003", "A02KA032004", "A02KA032005",
        "A03KA028001", "A03KA028002", "A03KA028003", "A03KA028004", "A03KA028005"
    );

    // 檢查是否有 POST 資料
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 檢查是否有提交表單
        $searchNumber = $_POST["searchNumber"];

        // 使用 array_filter 函數進行模糊比對搜尋
        $result = array_filter($data, function ($value) use ($searchNumber) {
            return strpos($value, $searchNumber) !== false;
        });

        if (!empty($result)) {
            echo "<p>秀出此資料：</p>";
            echo "<ul>";
            foreach ($result as $item) {
                echo "<li>$item</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>'無找到'</p>";
        }
    }
    ?>
</body>

</html>