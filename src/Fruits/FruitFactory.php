<?php

namespace App\Fruits;

class FruitFactory
{
    protected int $minWeight = 0;

    protected int $maxWeight = 0;
    
    public function __construct(protected string $type, string $folder = 'config')
    {
        $config = require __DIR__ . "/../$folder/fruits.php";

        if (array_key_exists($type, $config)) {
            $this->minWeight = $config[$type]['min_weight'];
            $this->maxWeight = $config[$type]['max_weight'];
        }
    }

    public function getFruit()
    {
        return new Fruit(
            $this->type,
            rand($this->minWeight, $this->maxWeight)
        );
    }
}
