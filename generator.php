<?php
function fib($n): Generator
{
    $cur = 1;
    $prev = 0;
    for ($i = 0; $i < $n; $i++) {
        yield $cur;

        $temp = $cur;
        $cur = $prev + $cur;
        $prev = $temp;
    }
}

$fibs = fib(9);
while ($fibs->valid()) {
    echo $fibs->current() . PHP_EOL;
    $fibs->next();
}
