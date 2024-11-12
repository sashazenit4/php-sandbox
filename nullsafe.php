<?php
declare(strict_types=1);
class Country {
    public $id;
    public $name;
    public $cities;

    public function __construct($id, $name, $cities = []) {
        $this->id = $id;
        $this->name = $name;
        $this->cities = $cities;
    }
}

class User {
    public int $id;
    public string $fio;
    public ?Country $country;

    public function __construct(int $id, string $fio, ?Country $country = null) {
        $this->id = $id;
        $this->fio = $fio;
        $this->country = $country;
    }
}

$country1 = new Country(1, 'Germany', ['Berlin', 'Munich', 'Hamburg']);
$user1 = new User(1, 'John Doe', $country1);

$user2 = new User(2, 'Jane Smith');

echo "User 1's cities:\n";
var_dump($user1->country->cities);

echo "User 2's cities:\n";
var_dump($user2->country->cities);

echo "User 2's cities:\n";
var_dump($user2->country?->cities);
