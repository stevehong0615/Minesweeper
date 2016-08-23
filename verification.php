<?php
header("Content-Type:text/html; charset=utf-8");

$map = $_GET['map'];
$mapNoN = str_replace('N','',$map);
$checkString = strlen($mapNoN);
$mapNoA = str_split($mapNoN);
$mapNoB = array_chunk($mapNoA, 10);
$mapA = str_split($map);
$stringCount = array_count_values($mapA);

// 判斷炸彈周圍數字顯示是否正確
if ($checkString == 100) {
    $check = true;
    $showRight = 0 ;
    for ($a = 0; $a < 10; $a++) {
        for ($b = 0; $b < 10; $b++) {
            $mineCount = 0;
            if ($mapNoB[$a][$b] != "M") {
                if ($mapNoB[$a][$b-1] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a][$b+1] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a+1][$b] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a-1][$b] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a-1][$b-1] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a-1][$b+1] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a+1][$b-1] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a+1][$b+1] == "M") {
                    $mineCount++;
                }
                if ($mapNoB[$a][$b] != $mineCount){
                    if($showRight == 0) {
                        echo "不符合，因為";
                        $showRight = 1;
                    }
                    echo "[" . $a . " , " . $b . "]" . " 判斷錯誤，應該為" . $mineCount;
                    $check = false;
                }
            }
        }
    }
}

// 字串符合的判斷
if (mb_strlen($map) == 109) {
    if ($stringCount['M'] < 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，炸彈數量小於40";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，炸彈數量小於40，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，炸彈數量小於40，N大於9";
        }
    }
    if ($stringCount['M'] > 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，炸彈數量大於40";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，炸彈數量大於40，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，炸彈數量大於40，N大於9";
        }
    }
}

// 不符合，字串長度小於109的判斷
if (mb_strlen($map) < 109) {
    if ($stringCount['M'] == 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度小於109";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度小於109，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度小於109，N大於9";
        }
    }
    if ($stringCount['M'] < 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度小於109，炸彈數量小於40";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度小於109，炸彈數量小於40，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度小於109，炸彈數量小於40，N大於9";
        }
    }
    if ($stringCount['M'] > 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度小於109，炸彈數量大於40";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度小於109，炸彈數量大於40，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度小於109，炸彈數量大於40，N大於9";
        }
    }
}

// 不符合，字串長度大於109的判斷
if (mb_strlen($map) > 109) {
    if ($stringCount['M'] == 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度大於109";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度大於109，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度大於109，N大於9";
        }
    }
    if ($stringCount['M'] < 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度大於109，炸彈數量小於40";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度大於109，炸彈數量小於40，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度大於109，炸彈數量小於40，N大於9";
        }
    }
    if ($stringCount['M'] > 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度大於109，炸彈數量大於40";
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度大於109，炸彈數量大於40，N小於9";
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度大於109，炸彈數量大於40，N大於9";
        }
    }
}

// 符合
if (mb_strlen($map) == 109 && $stringCount['M'] == 40 && $stringCount['N'] == 9 && $checkString == 100 && $check == true) {
    echo "符合";
}
