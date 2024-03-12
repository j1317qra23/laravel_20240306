<?php
// 定義 PHP 物件
$data = new stdClass();
$data->STATUS = 200;

$data->DATA = new stdClass();
$data->DATA->ERROR = 0;
$data->DATA->MESSAGE = "Hello";
$data->DATA->SUCCESS = 1;
$data->DATA->erpkey = "2111LV11MD0Y_X_A01AR2111";
$data->DATA->EMAIL = "zzz@zzz.com";

// 將 PHP 物件轉換成 JSON 格式的字串
$jsonString = json_encode($data, JSON_PRETTY_PRINT);

// 輸出 JSON 格式的字串
echo $jsonString;
