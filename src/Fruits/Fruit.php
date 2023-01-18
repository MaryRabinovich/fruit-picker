<?php

namespace App\Fruits;

class Fruit
{
    public function __construct(
        protected string $type,
        protected int $weight
    ) {}

    public function getType()
    {
        return $this->type;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}
