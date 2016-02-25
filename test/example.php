#!/usr/bin/env php
<?php
/**
 * File: test/example.php
 */

require __DIR__ . '/../src/Thumbnail.php';

$srcImages = [
    __DIR__.'/img/1.jpg',
    __DIR__.'/img/2.jpg',
    __DIR__.'/img/3.jpg',
    __DIR__.'/img/4.jpg'
];

$outputDir = __DIR__ . '/output';

$thumbnail = \Clarence\Thumbnail\Thumbnail::createFromImages($srcImages, 240, 320);
$thumbnail->writeImage($outputDir."/example.jpg");

echo "Done!";

