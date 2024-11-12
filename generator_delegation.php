<?php
function inner(): Generator
{
    yield 1; // Ключ 0
    yield 2; // Ключ 1
    yield 3; // Ключ 2
}

function gen(): Generator
{
    yield 0; // Ключ 0
    yield from inner(); // Ключи 0-2
    yield 4; // Ключ 1
}

var_dump(iterator_to_array(gen(), false));
