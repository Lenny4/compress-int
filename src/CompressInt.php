<?php

namespace Lenny4\CompressInt;

// https://stackoverflow.com/questions/20160413/how-to-compress-a-very-large-number-into-alphanumeric-in-php
class CompressInt
{
    public const DEFAULT_SYMBOLS_INSENSITIVE = '0123456789abcdefghijklmnopqrstuvwxyz';
    public const DEFAULT_SYMBOLS = self::DEFAULT_SYMBOLS_INSENSITIVE . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public const LONG_SYMBOLS = self::DEFAULT_SYMBOLS . '!#$%&()*+,-/:;<=>?@[\]^_{|}~';
    public const LONG_SYMBOLS_INSENSITIVE = self::DEFAULT_SYMBOLS_INSENSITIVE . '!#$%&()*+,-/:;<=>?@[\]^_{|}~';

    public static function compress(int|float $num, string $symbols = self::DEFAULT_SYMBOLS): string
    {
        // get the radix that we are working with
        $radix = strlen($symbols);
        $out = [];
        if ($num === 0) {
            // if our number is zero then we can just use the first character of our symbols and we are done.
            return $symbols[0];
        }
        // otherwise we have to loop through and rebase the integer one character at a time.
        while ($num > 0) {
            // split off one digit
            $r = $num % $radix;
            // convert it and add it to the char array
            $out[] = $symbols[$r];
            // subtract what we have added to the compressed string
            $num = (int)floor(($num - $r) / $radix);
        }

        return implode('', $out);
    }

    public static function decompress(string $compressNumber, string $symbols = self::DEFAULT_SYMBOLS): int|float
    {
        //get length of the char map, so you can change according to your needs
        $radix = strlen($symbols);
        //split the chars into an array and initialize variables
        $arr = str_split($compressNumber, 1);
        $i = 0;
        $out = 0;
        //loop through each char assigning values
        //chars to the left are the least significant
        foreach ($arr as $char) {
            $pos = strpos($symbols, $char);
            $partialSum = $pos * ($radix ** $i);
            $out += $partialSum;
            $i++;
        }

        return $out;
    }
}
