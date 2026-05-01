<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use RectorLaravel\Set\LaravelSetList; // تأكد من وجود هذا السطر

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/routes',
    ])
    ->withRules([
        AddVoidReturnTypeWhereNoReturnRector::class,
    ])
    // الطريقة الصحيحة لتعريف المجموعات في النسخ الحديثة
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true
    )
    // إضافة دعم لارافل بشكل منفصل
    ->withSets([
        LaravelSetList::LARAVEL_100 // أو النسخة التي تناسب مشروعك
    ]);