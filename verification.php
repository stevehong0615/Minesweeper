<?php
header("Content-Type:text/html; charset=utf-8");

$map = $_GET['map'];
$mapNoN = str_replace('N','',$map);
$mapNoA = str_split($mapNoN);
$mapNoB = array_chunk($mapNoA, 10);
$mapA = str_split($map);
$stringCount = array_count_values($mapA);
$stringCount[][] = $stringCount[$a][$b];

// 判斷是否為10 * 10 的陣列
for ($i = 0; $i < count($a); $i++) {
    $countColNumber = 0;
    for ($j = 0; $j < count($b); $j++) {
        $countColNumber++;
    }
    $countRowNumber++;
}

if ($countRowNumber == 10 && $countColNumber == 10){
    $arrayJudgment = null;
}

if ($countRowNumber == 10 && $countColNumber != 10){
    $arrayJudgment = "，不是10 * 10 的陣列";
}

if ($countRowNumber != 10 && $countColNumber == 10){
    $arrayJudgment = "，不是10 * 10 的陣列";
}

if ($countRowNumber != 10 && $countColNumber != 10){
    $arrayJudgment = "，不是10 * 10 的陣列";
}

// 如果是10 * 10 的陣列 判斷炸彈周圍數字顯示是否正確
if ($arrayJudgment == null) {
    for ($a = 0; $a < 10; $a++) {
        for ($b = 0; $b < 10; $b++) {
            $mineCount = 0;
            if ($stringCount[$a][$b] == "M") {
                if ($stringCount[$a][$b] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a][$b+1] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a+1][$b] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a-1][$b] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a-1][$b-1] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a-1][$b+1] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a+1][$b-1] != "M") {
                    $mineCount++;
                }
                if ($stringCount[$a+1][$b+1] != "M") {
                    $mineCount++;
                }
            }
        }
    }

    for ($a = 0; $a < 10; $a++) {
        for ($b = 0; $b < 10; $b++) {
            echo $stringCount[$a][$b];
        }
        if ($a < 9) {
            echo "N";
        }
    }
}











// 符合
if (mb_strlen($map) == 109 && $stringCount['M'] == 40 && $stringCount['N'] == 9 && $arrayJudgment = true) {
    echo "符合";
}

// 字串符合的判斷
if (mb_strlen($map) == 109) {
    if ($stringCount['M'] < 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，炸彈數量小於40" . $arrayJudgment;
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，炸彈數量小於40，N小於9" . $arrayJudgment;
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，炸彈數量小於40，N大於9" . $arrayJudgment;
        }
    }
    if ($stringCount['M'] > 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，炸彈數量大於40" . $arrayJudgment;
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，炸彈數量大於40，N小於9" . $arrayJudgment;
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，炸彈數量大於40，N大於9" . $arrayJudgment;
        }
    }
}

// 不符合，字串長度小於109的判斷
if (mb_strlen($map) < 109) {
    if ($stringCount['M'] == 40 && $stringCount['N'] == 9) {
        echo "不符合，因為字串長度小於109" . $arrayJudgment;
    }
    if ($stringCount['M'] < 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度小於109，炸彈數量小於40" . $arrayJudgment;
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度小於109，炸彈數量小於40，N小於9" . $arrayJudgment;
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度小於109，炸彈數量小於40，N大於9" . $arrayJudgment;
        }
    }
    if ($stringCount['M'] > 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度小於109，炸彈數量大於40" . $arrayJudgment;
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度小於109，炸彈數量大於40，N小於9" . $arrayJudgment;
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度小於109，炸彈數量大於40，N大於9" . $arrayJudgment;
        }
    }
}

// 不符合，字串長度大於109的判斷
if (mb_strlen($map) > 109) {
    if ($stringCount['M'] == 40 && $stringCount['N'] == 9) {
        echo "不符合，因為字串長度大於109" . $arrayJudgment;
    }
    if ($stringCount['M'] < 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度大於109，炸彈數量小於40" . $arrayJudgment;
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度大於109，炸彈數量小於40，N小於9" . $arrayJudgment;
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度大於109，炸彈數量小於40，N大於9" . $arrayJudgment;
        }
    }
    if ($stringCount['M'] > 40) {
        if ($stringCount['N'] == 9) {
            echo "不符合，因為字串長度大於109，炸彈數量大於40" . $arrayJudgment;
        }
        if ($stringCount['N'] < 9) {
            echo "不符合，因為字串長度大於109，炸彈數量大於40，N小於9" . $arrayJudgment;
        }
        if ($stringCount['N'] > 9) {
            echo "不符合，因為字串長度大於109，炸彈數量大於40，N大於9" . $arrayJudgment;
        }
    }
}
