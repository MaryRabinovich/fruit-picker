<?php

require 'vendor/autoload.php';

use App\Trees\TreeFactory;

$appleTreeFactory = new TreeFactory('apple');
$pearTreeFactory = new TreeFactory('pear');

$garden = [];


echo PHP_EOL, 'добавляю деревья сад', PHP_EOL;
for ($i = 0; $i < 10; $i++) {
    $garden[] = $appleTreeFactory->getTree();
}
for ($i = 0; $i < 15; $i++) {
    $garden[] = $pearTreeFactory->getTree();
}
echo '-- деревья добавлены', PHP_EOL;


echo PHP_EOL, 'начинаю сбор продукции со всех деревьев', PHP_EOL;

$count = [
    'apple' => 0,
    'pear' => 0
];
$weight = [
    'apple' => 0,
    'pear' => 0
];

foreach ($garden as $tree) {
    $fruits = $tree->getFruits();
    $type = $tree->getType();
    $count[$type] += count($fruits);
    foreach ($fruits as $fruit) {
        $weight[$type] += $fruit->getWeight();
    }
}

echo '-- сбор завершён, всего собрано:', PHP_EOL;
echo '---- яблок: ', $count['apple'], PHP_EOL;
echo '---- груш: ', $count['pear'], PHP_EOL, PHP_EOL;

echo '-- общий вес (в граммах):', PHP_EOL;
echo '---- яблок: ', $weight['apple'], PHP_EOL;
echo '---- груш: ', $weight['pear'], PHP_EOL, PHP_EOL;

echo '-- средний вес (в граммах):', PHP_EOL;
echo '---- яблока: ', floor($weight['apple'] / $count['apple']), PHP_EOL;
echo '---- груши: ', floor($weight['pear'] / $count['pear']), PHP_EOL, PHP_EOL;
