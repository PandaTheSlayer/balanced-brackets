<?php

use Psr\Container\ContainerInterface;

$root = dirname(__DIR__);
require "$root/vendor/autoload.php";

$builder = new \DI\ContainerBuilder();
$builder->useAutowiring(true);

$builder->addDefinitions([
    \BracketsChecker\Checker::class => \DI\object()->constructor(),
    \BracketsChecker\CheckerCommand::class => DI\object()
        ->constructor(DI\get(\BracketsChecker\Checker::class)),
]);

$container = $builder->build();
