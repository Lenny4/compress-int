<?php

use Lenny4\CompressInt\CompressInt;

$number = 123456;
$expectedCompress = 'e7w';

it('can compress number', function () use ($number, $expectedCompress) {
    $compress = CompressInt::compress($number);
    expect($compress)->toEqual($expectedCompress);
});

it('can decompress number', function () use ($number, $expectedCompress) {
    $decompress = CompressInt::decompress($expectedCompress);
    expect($decompress)->toEqual($number);
});

it('shouldn\'t have duplicated', function () {
    $ref = new ReflectionClass(CompressInt::class);
    foreach ($ref->getConstants() as $constant) {
        $array = explode($constant, '');
        // https://stackoverflow.com/questions/3145607/php-check-if-an-array-has-duplicates#answer-43635394
        expect(true)->toEqual(count($array) === count(array_flip($array)));
    }
});
