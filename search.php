<?php

declare(strict_types=1);

namespace Dk\Test;

class NearElement
{
    public $value;
    public $index;
    function __construct(int $index, int $value)
    {
        $this->index = $index;
        $this->value = $value;
    }
}

function searchNear(array $arr, int $num): NearElement
{
    $left = -1;
    $right = count($arr);
    $middle = 0;

    while ($right - $left > 1) {
        $middle = (int) floor(($right + $left) / 2);

        if ($arr[$middle] === $num) {
            return new NearElement($middle, $arr[$middle]);
        }

        if ($num < $arr[$middle]) {
            $right = $middle;
        } else {
            $left = $middle;
        }
    }

    if ($left === -1 || $right === count($arr)) {
        return new NearElement($middle, $arr[$middle]);
    }

    if (($arr[$right] - $num) < ($num - $arr[$left])) {
        return new NearElement($right, $arr[$right]);
    }

    return new NearElement($left, $arr[$left]);
}

print_r(searchNear([1, 5, 6, 8, 10, 20, 40, 61], 0));
print_r(searchNear([1, 5, 6, 8, 10, 20, 40, 61], 8));
print_r(searchNear([1, 5, 6, 8, 10, 20, 40, 61], 54));
print_r(searchNear([1, 5, 6, 8, 10, 20, 40, 61], 30));
print_r(searchNear([1, 5, 6, 8, 10, 20, 40, 61], 24));
print_r(searchNear([1, 5, 6, 8, 10, 20, 40, 61], 120));
