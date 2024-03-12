B. 請使用 PHP 解析底下的 JSON , 並取出 erpkey, 印出呈現在網頁上.
Answer:
<!DOCTYPE html>
<html>

<head>
    <title>JSON Parser</title>
</head>

<body>

    <?php
    $jsonData = '{
    "STATUS": 200,
    "DATA": {
        "ERROR": 0,
        "MESSAGE": "Hello",
        "SUCCESS": 1,
        "erpkey": "2111LV11MD0Y_X_A01AR2111",
        "EMAIL": "zzz@zzz.com"
    }
}';

    // 解析 JSON
    $dataArray = json_decode($jsonData, true);

    // 取出 erpkey
    $erpkey = $dataArray['DATA']['erpkey'];

    // 印出在網頁上
    echo "<p>erpkey: $erpkey</p>";
    ?>

</body>

</html>

C. 請問 PHP 語法中 $a = json_decode($var1 , true); 其中參數 true 的用途為何?沒加此參數
true 可以?請示範or請解說。
Answer:
<?php
// 不指定 true，返回物件
$a = json_decode('{"key":"value"}');
echo $a->key; // 輸出: value

// 使用 true，返回關聯陣列（associative array）
$b = json_decode('{"key":"value"}', true);
echo $b['key']; // 輸出: value

?>