<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (Finder::create())
    ->in(__DIR__.'/../../')
;

$config = (new Config())
    ->setRules([
        '@PSR12' => true,
        '@Symfony' => true,
        'blank_line_before_statement' => false,
        'no_unneeded_control_parentheses' => false,
        'yoda_style' => false,
    ])
    ->setFinder($finder)
    ->setUsingCache(false)
;

return $config;
