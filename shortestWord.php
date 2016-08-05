<?php
/**
 * PHP version 7
 * shortestWord.php
 * Author L Tennant
 *
 */

namespace shortword;

// Test text.
$stub = "some line with text
another line";

// Both methods use explode to create an array of words.
$lines = explode("\n", $stub);

// Method 1 - returns only the shortest word from each line (first occurance)
$shortest = [];
foreach ($lines as $line) {
    $short = '';
    $words = explode(' ', $line);
    foreach ($words as $word) {
        if ($short == null) $short = $word;
        if (strlen($word) < strlen($short)) $short = $word;
    }
    $shortest[] = $short;
}

echo "Method 1 ", PHP_EOL;
print_r($shortest);


// Method 2 - returns all the word in length order, thus the shortest word is at [0].
$shortest = [];
foreach ($lines as $line) {
    $words = explode(' ', $line);
    usort($words, function ($a, $b){
        return strlen($a) - strlen($b);
    });
    $shortest[] = $words;
}

echo "Method 2", PHP_EOL;
print_r($shortest);
