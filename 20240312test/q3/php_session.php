<?php
session_start();
// 設定時區為 Asia/Taipei
date_default_timezone_set("Asia/Taipei");

$_SESSION['last_visit'] = date("Y-m-d H:i:s");

$session_expiration = 3 * 60 * 60; 
if (isset($_SESSION['last_visit']) && (time() - strtotime($_SESSION['last_visit']) > $session_expiration)) {
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['last_visit'] = date("Y-m-d H:i:s");
}

// (當下時間+1 天),(+1 個月),(+1 年)
$next_day = date("Y-m-d H:i:s",strtotime("+1 day"));
$next_month = date("Y-m-d H:i:s", strtotime("+1 month"));
$next_year = date("Y-m-d H:i:s", strtotime("+1 year"));

// 輸出// (當下時間+1 天),(+1 個月),(+1 年)
echo "當下時間+1 天： " . $next_day . "<br>";
echo "當下時間+1 個月： " . $next_month . "<br>";
echo "當下時間+1 年： " . $next_year;
?>
