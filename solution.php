<?php

declare(strict_types=1);

function createRandNum(int $length, string $set = '0123456789'): int
{
    $retNum = '';
    $randMax =  strlen($set) - 1;
    $i = 0;
    while ($i < $length) {
        $randNum = (int)$set[rand(0, $randMax)];
        if ($i === 0 && $randNum === 0) {
            continue;
        }
        $retNum .= $randNum;
        ++$i;
    }
    return (int)$retNum;
}

function solution(int $num, string $n = ''): array
{
    $numArr = str_split((string)$num);
    foreach ($numArr as $k => $v) {
        if (empty($v)) {
            unset($numArr[$k]);
        }
    }
    $r = [];

    if (count($numArr) && is_array($numArr)) {
        foreach ($numArr as $k => $v) {
            $_n = $n . $v;
            $_arr = $numArr;
            unset($_arr[$k]);
            $_num = '';
            foreach ($_arr as $ak => $av) {
                $_num .= $av;
            }
            $_r = solution((int)$_num, $_n);

            $r = array_merge($r, $_r);
        }
    } else {
        $r[] = $n;
    }
    return $r;
}


$randNum = createRandNum(8);
$solutionNumbers = solution($randNum);
var_dump(count($solutionNumbers));

