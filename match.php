<?php

// match(8から使える)

// 型と完全一致(===)
$score = '1';
$result = match ($score) {
    1 => '一',
    2 => '二',
    3 => '三',
    default => '他'
};

echo $result."\n";

// 簡単な比較(==)
$score = '1';
switch ($score) {
    case 1:
        $result = '一';
        break;
    case 2:
        $result = '二';
        break;
    case 3:
        $result = '三';
        break;
    default:
        $result = '他';
        break;
} 

echo $result."\n";