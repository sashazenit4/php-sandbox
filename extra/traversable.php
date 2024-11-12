<?php
$items = [1, 2];

echo $items instanceof Traversable || is_array($items) ? 'Can be iterated': 'Cannot be iterated';

/**
 * Traversable может быть реализован абстрактным классом (>=7.4)
 * У интерфейса нет методов.
 * Единственная цель интерфейса — быть базовым интерфейсом
 * для классов, которым доступен обход.
 */
