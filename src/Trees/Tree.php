<?php

namespace App\Trees;

use App\Fruits\Fruit;

class Tree
{
    /**
     * @param string $type
     * @param Fruit[] $fruits
     */
    public function __construct(
        protected string $type,
        protected array $fruits
    ) {}

    public function getType()
    {
        return $this->type;
    }

    public function getFruits()
    {
        return $this->fruits;
    }
}
