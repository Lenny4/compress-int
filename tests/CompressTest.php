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
