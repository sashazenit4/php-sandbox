<?php
function quickSort(array $array): array {
    if (count($array) < 2) {
        return $array;
    }

    $left = $right = [];
    reset($array);
    $pivot = array_shift($array);

    foreach ($array as $item) {
        if ($item < $pivot) {
            $left[] = $item;
        } else {
            $right[] = $item;
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

$array = [-4, 1, 25, 50, 8, 10, 23];

echo "Unsorted Array:\n";
print_r($array);
$array = quicksort($array);

echo "Sorted Array:\n";
print_r($array);
