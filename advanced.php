<?php
// 預設
$grid = array();
$width = 60;
$height = 50;
$mines = 1200;

// 產生陣列
for ($row = 0; $row < $width; $row++) {
    for ($col = 0; $col < $height; $col++) {
        $grid[$row][$col] = "0";
    }
}

// 產生地雷
for ($mine = 0; $mine < $mines; $mine++) {
    $row = rand(0, $width-1);
    $col = rand(0, $height-1);

    // 檢查有沒有重複
    if ($grid[$row][$col] == "M") {
        $mine--;
    }

    // 沒跑過的座標為0 值改為M
    if ($grid[$row][$col] == "0") {
        $grid[$row][$col] = "M";
    }
}

// 範圍內地雷個數
for ($row = 0; $row < $width; $row++) {
    for ($col = 0; $col < $height; $col++) {
        if ($grid[$row][$col] == "M") {
            if ($grid[$row][$col-1] != "M") {
                $grid[$row][$col-1]++;
            }
            if ($grid[$row][$col+1] != "M") {
                $grid[$row][$col+1]++;
            }
            if ($grid[$row+1][$col] != "M") {
                $grid[$row+1][$col]++;
            }
            if ($grid[$row-1][$col] != "M") {
                $grid[$row-1][$col]++;
            }
            if ($grid[$row-1][$col-1] != "M") {
                $grid[$row-1][$col-1]++;
            }
            if ($grid[$row-1][$col+1] != "M") {
                $grid[$row-1][$col+1]++;
            }
            if ($grid[$row+1][$col-1] != "M") {
                $grid[$row+1][$col-1]++;
            }
            if ($grid[$row+1][$col+1] != "M") {
                $grid[$row+1][$col+1]++;
            }
        }
    }
}

for ($row = 0; $row < $width; $row++) {
    for ($col = 0; $col < $height; $col++) {
        echo $grid[$row][$col];
    }
    if ($row < $width-1) {
        echo "N";
    }
}
