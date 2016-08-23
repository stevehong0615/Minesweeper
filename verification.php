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
function bombNumber($mapNoB)
{
    $check = true;
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
                    $messageReturn[$i] = "數字對應有錯" . "[" . $a . " , " . $b . "]" . " 判斷錯誤，應該為" . $mineCount . "---";
                    $i++;
                    $check = false;
                }
            }
        }
    }
    if ($messageReturn == null) {
        return "yes";
    } else {
        return $messageReturn;
    }
}

// 字串長度判斷
function stringLen($map)
{
    if (mb_strlen($map) == 109) {
        return "yes";
    }
    if (mb_strlen($map) < 109) {
        return "字串長度小於109";
    }
    if (mb_strlen($map) > 109) {
        return "字串長度大於109";
    }
}

// 炸彈數量判斷
function boNumber($stringCount)
{
    if ($stringCount['M'] == 40) {
        return "yes";
    }
    if ($stringCount['M'] != 40) {
        return "地雷數量有錯，有" . $stringCount['M'] . "顆地雷";
    }
}

// N數量判斷
function nNumber($stringCount)
{
    if ($stringCount['N'] == 9) {
        return "yes";
    }
    if ($stringCount['N'] != 9) {
        return "N數量有錯，有" . $stringCount['N'] . "個N";
    }
}

function stringCheck($mapA)
{
    $standard = "/^([0-8M-N]+)$/";
    $checkNs = 1;
    $j = 0;
    foreach ($mapA as $value) {
        if(!preg_match($standard, $value, $result)) {
            if ($value == " ") {
                $value = "%";
            }
            $message[$j] = "第" . $checkNs . "個字元為" . $value . "不符合規定---";
            $j++;
        }
        $checkNs++;
    }
    if ($message == null) {
        return "yes";
    } else {
        return $message;
    }
}

$a = bombNumber($mapNoB, $showLeft);
$b = stringLen($map);
$c = boNumber($stringCount);
$d = nNumber($stringCount);
$e = stringCheck($mapA, $showRight, $checkNs);

if ($a == "yes" && $b == "yes" && $c == "yes" && $d == "yes" && $e == "yes") {
    echo "符合";
} else {
    echo "不符合，因為";
    if ($a != "yes") {
        foreach ($a as $value) {
            echo $value;
        }
    }
    if ($b != "yes") {
        echo $b;
    }
    if ($c != "yes") {
        echo $c;
    }
    if ($d != "yes") {
        echo $d;
    }
    if ($e != "yes") {
        foreach ($e as $value) {
            echo $value;
        }
    }
}
