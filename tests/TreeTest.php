<?php

declare (strict_types = 1);

use PHPUnit\Framework\TestCase;
use App\Trees\TreeFactory;

class TreeTest extends TestCase
{
    public function setUp(): void
    {
        $path = '../tests/fixtures';

        $this->appleTreeFactory = new TreeFactory('apple', $path);
        $this->pearTreeFactory = new TreeFactory('pear', $path);
        $this->emptyTreeFactory = new TreeFactory('empty', $path);

        $this->appleTree = $this->appleTreeFactory->getTree();
        $this->pearTree = $this->pearTreeFactory->getTree();
        $this->emptyTree = $this->emptyTreeFactory->getTree();
    }

    /** @test */
    public function tree_factory_class_is_accessible()
    {
        $this->assertInstanceOf(TreeFactory::class, $this->appleTreeFactory);
    }

    /** @test */
    public function tree_factory_returns_correct_tree_types()
    {
        $this->assertEquals($this->appleTree->getType(), 'apple');
        $this->assertEquals($this->pearTree->getType(), 'pear');
        $this->assertEquals($this->emptyTree->getType(), 'empty');
    }

    /** @test */
    public function tree_factory_returns_trees_of_configured_types_with_correct_types_of_fruits()
    {
        $this->assertEquals($this->appleTree->getFruits()[0]->getType(), 'apple');
        $this->assertEquals($this->pearTree->getFruits()[0]->getType(), 'pear');
    }
    
    /** @test */
    public function tree_of_unknown_type_is_created_with_zero_fruits()
    {
        $this->assertEquals(count($this->emptyTree->getFruits()), 0);
    }

    /** @test */
    public function tree_factory_returns_trees_with_correct_number_of_fruits()
    {
        $this->assertEquals(count($this->appleTree->getFruits()), 2);
        $this->assertEquals(count($this->pearTree->getFruits()), 1);
    }
}
