<?php

namespace App\Trees;

use App\Fruits\FruitFactory;

class TreeFactory
{
    protected int $minFruitsCount = 0;

    protected int $maxFruitsCount = 0;

    public function __construct(protected string $type, string $folder = 'config')
    {
        $config = require __DIR__ . "/../$folder/trees.php";

        $this->fruitFactory = new FruitFactory($type, $folder);

        if (array_key_exists($type, $config)) {
            $this->minFruitsCount = $config[$type]['min_fruits_count'];
            $this->maxFruitsCount = $config[$type]['max_fruits_count'];
        }
    }

    public function getTree()
    {
        $fruitsCount = rand($this->minFruitsCount, $this->maxFruitsCount);
        
        $fruits = [];
        for ($i = 0; $i < $fruitsCount; $i++) {
            $fruits[] = $this->fruitFactory->getFruit();
        }

        return new Tree($this->type, $fruits);
    }
}
