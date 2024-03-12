<?php
session_start();

$_SESSION['last_visit'] = date("Y-m-d H:i:s");

// 設定 session 有效期為 3 小時
$session_expiration = 3 * 60 * 60; // 3 小時的秒數
if (isset($_SESSION['last_visit']) && (time() - strtotime($_SESSION['last_visit']) > $session_expiration)) {
    // 如果 session 已過期，清除 session 並重新設定
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['last_visit'] = date("Y-m-d H:i:s");
}

// 輸出當前時間
echo "當前時間： " . $_SESSION['last_visit'];
?>
