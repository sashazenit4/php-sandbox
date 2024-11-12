<?php
function real_array_shift(array &$array, $shift): void
{
    $shift /= -1;
    $shift = $shift % count($array);
    if ($shift == 0) {
        return;
    }
    $firstPart = array_reverse(array_slice($array, 0, $shift));
    $secondPart = array_reverse(array_slice($array, $shift, count($array) - 1));
    $array = array_reverse(array_merge($firstPart, $secondPart));
}

function print_array_in_row(array $a, bool $needEndLine = false): void
{
    foreach ($a as $elIndex => $el) {
        if ($elIndex == count($a) - 1) {
            echo $el;
        } else {
            echo $el . ' ';
        }
    }
    if ($needEndLine) {
        echo PHP_EOL;
    }
}

$a = [1, 2, 3, 4, 5];
$shift = -111;
echo 'Array before shifting: ';
print_array_in_row($a, true);
echo 'Shift value: ' . $shift . PHP_EOL;
real_array_shift($a, $shift);
echo 'Array after shifting: ';
print_array_in_row($a, true);
