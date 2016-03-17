<?php
namespace Controllers;

use Pimple\Container;

$container = new Container();

$container['dateTimeOne'] = function() {
    return new DateTime();
};

$date = $container['dateTimeOne'];

$date = $container['dateTimeOne'];
$formatted = $date->format('Y-m-d H:i:s');

echo $formatted;
