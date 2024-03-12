<?php
require 'vendor/autoload.php'; // 確保 autoload.php 路徑正確

use Carbon\Carbon;

// A. 取得目前時間
$now = Carbon::now();
$nowFormatted = $now->format('Y-m-d H:i:s');

// B. 取得 $now + 14 個月的時間
$adjustedTime = $now->addMonths(14);
$adjustedTimeFormatted = $adjustedTime->format('Y-m-d H:i:s');

// C. 取得 $adjustedTime 的年、月、日
$y = $adjustedTime->year;
$m = $adjustedTime->month;
$d = $adjustedTime->day;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Example</title>
</head>
<body>
    <h1>Carbon Example</h1>

    <p>A. 目前時間: <?php echo $nowFormatted; ?></p>

    <p>B. 調整後時間(加上 14 個月): <?php echo $adjustedTimeFormatted; ?></p>

    <p>C. 拆離時間:
        <ul>
            <li>年: <?php echo $y; ?></li>
            <li>月: <?php echo $m; ?></li>
            <li>日: <?php echo $d; ?></li>
        </ul>
    </p>
</body>
</html>
