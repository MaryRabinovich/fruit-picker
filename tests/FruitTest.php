<?php

declare (strict_types = 1);

use PHPUnit\Framework\TestCase;
use App\Fruits\FruitFactory;
use App\Fruits\Fruit;

class FruitTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->path = '/../tests/fixtures/fruits.php';
        $this->appleFactory = new FruitFactory('apple', $this->path);
        $this->pearFactory = new FruitFactory('pear', $this->path);
        $this->emptyFactory = new FruitFactory('empty', $this->path);
    }

    /** @test */
    public function fruit_factory_class_is_accessible()
    {
        $this->assertInstanceOf(FruitFactory::class, $this->appleFactory);
    }

    /** @test */
    public function fruit_factory_builds_fruits_with_correct_types()
    {
        $this->assertEquals($this->appleFactory->getFruit()->getType(), 'apple');
        $this->assertEquals($this->pearFactory->getFruit()->getType(), 'pear');
        $this->assertEquals($this->emptyFactory->getFruit()->getType(), 'empty');
    }

    /** @test */
    public function fruit_factory_takes_min_and_max_weights_from_config_for_preconfigurates_fruit_types()
    {
        $this->assertEquals($this->appleFactory->getFruit()->getWeight(), 1357);
        $this->assertEquals($this->pearFactory->getFruit()->getWeight(), 234);
    }

    /** @test */
    public function fruit_factory_sets_min_and_max_weights_to_zero_for_non_configurated_fruit_types()
    {
        $this->assertEquals($this->emptyFactory->getFruit()->getWeight(), 0);
    }
}
