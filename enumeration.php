<?php

#[Attribute]
class Friendly
{
    public function __construct(public string $name) {}
}

enum Fruits: string {
    #[Friendly("Apple")]
    case Apple = 'apple';

    #[Friendly("Green Apple")]
    case GreenApple = 'green-apple';

    #[Friendly("Strawberry")]
    case Strawberry = 'strawberry';

    public function isApple(): bool
    {
        return $this === Fruits::Apple || $this === Fruits::GreenApple;
    }

    public function friendly(): string
    {
        $reflection = new \ReflectionEnumUnitCase(self::class, $this->name);
        $attributes = $reflection->getAttributes(Friendly::class);

        if (!empty($attributes)) {
            return $attributes[0]->newInstance()->name;
        }

        return $this->name;
    }
}

echo Fruits::Apple->isApple() ? 'Yes' : 'No';
echo PHP_EOL;
echo Fruits::GreenApple->friendly();
echo PHP_EOL;
echo Fruits::Strawberry->friendly();
