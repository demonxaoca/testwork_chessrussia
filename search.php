<?php
declare(strict_types=1);

function searchNear (Array $arr, int $num): Array
{
    $left = -1;
    $right = count($arr);
    $middle = 0;
    while($right - $left > 1) {
        $middle = floor(($right + $left) / 2);
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
    if ($left === -1 || $right === count($arr)) {
        return [
            "index" => $middle,
            "value" => $arr[$middle]
        ];
    }
    if (($arr[$right] - $num) < ($num - $arr[$left])) {
        return [
            "index" => $right,
            "value" => $arr[$right]
        ];
    } 
    return [
        "index" => $left,
        "value" => $arr[$left]
    ];
}

print_r(searchNear([1,5,6,8,10,20,40,61], 0));
print_r(searchNear([1,5,6,8,10,20,40,61], 54));
print_r(searchNear([1,5,6,8,10,20,40,61], 30));
print_r(searchNear([1,5,6,8,10,20,40,61], 24));
print_r(searchNear([1,5,6,8,10,20,40,61], 120));

