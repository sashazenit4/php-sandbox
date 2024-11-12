<?php
declare(strict_types=1);
class myIterator implements Iterator {
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    public function rewind(): void {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next(): void {
        ++$this->position;
    }

    public function valid(): bool {
        return isset($this->array[$this->position]);
    }
}

$it = new myIterator;

foreach($it as $key => $value) {
    echo $value . PHP_EOL;
}

$it->rewind();

while ($it->valid()) {
    echo $it->current() . PHP_EOL;
    $it->next();
}
