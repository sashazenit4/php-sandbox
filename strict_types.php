<?php
declare(strict_types=1);
function add(float $a, float $b): int
{
    return $a + $b;
}
$a = 1.5;
$b = 1.5;
var_dump(add($a, $b));
