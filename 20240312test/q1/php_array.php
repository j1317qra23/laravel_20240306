<?php
$string_src = "BSA01,BSA02,BSA03,BSA04,BSA05,BSA06,BSA07";

// 將字串轉換成陣列
$array_src = explode(",", $string_src);

foreach ($array_src as $key => $value) {
    // 顯示流水號並輸出每一項目
    echo ($key + 1) . "->" . $value . ", ";
}

?>
