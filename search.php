<?php
declare(strict_types=1);

function searchNear ($arr, $num) 
{
    $left = -1;
    $right = count($arr);
    $middle = 0;
    while($right - $left > 1) {
        $middle = floor(($right+$left)/2);
       
        if ($arr[$middle] === $num) {
            return [
                "index" => $right,
                "value" => $arr[$middle]
            ];
        }
        if ($num < $arr[$middle]) {
            $right = $middle;
        } else {
            $left = $middle;
        }
    }
    $lNum = PHP_INT_MIN;
    $rNum = PHP_INT_MAX;
    if ($arr[$left]) {
        $lNum = $num - $arr[$left];
    }
    if ($arr[$right]) {
        $rNum = $arr[$right] - $num;
    }
    if ($lNum < $rNum) {
        return [
            "index" => $left,
            "value" => $arr[$left]
        ];
    }
    return [
        "index" => $right,
        "value" => $arr[$right]
    ];
}

print_r(searchNear([1,5,6,8,10,20,40,61], 54));
print_r(searchNear([1,5,6,8,10,20,40,61], 30));
print_r(searchNear([1,5,6,8,10,20,40,61], 24));

