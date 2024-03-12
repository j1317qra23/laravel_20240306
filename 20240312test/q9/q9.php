<?php
// 設定回傳的 Content-Type 為 application/json
header('Content-Type: application/json');

// 從 GET 參數中獲取 mode，如果未提供，則預設為 null
$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

$data1 = array('name' => 'George', 'key' => '1234');
$data2 = array('name' => 'Judy', 'key' => '5678');

// 根據 mode 參數回傳相應的資料組 需要在網址後面加上?mode=1 or?model=2
if ($mode == 1) {
    $response = $data1; // 如果 mode 是 1，回傳資料組 1
} elseif ($mode == 2) {
    $response = $data2; // 如果 mode 是 2，回傳資料組 2
} else {
    $response = array('error' => 'Invalid mode parameter'); // 如果 mode 不是 1 或 2，回傳錯誤訊息
}

// 使用 json_encode 函數將 PHP 陣列轉換成 JSON 格式的字串
$jsonResponse = json_encode($response);

echo $jsonResponse;
