#!/usr/bin/env php
<?php

require __DIR__ . '/../src/Thumbnail.php';

$srcImages = [
    __DIR__.'/img/1.jpg',
    __DIR__.'/img/2.jpg',
    __DIR__.'/img/3.jpg',
    __DIR__.'/img/4.jpg'
];

$outputDir = __DIR__ . '/output';

$thumbnailTypes = [
    \Clarence\Thumbnail\CropThumbnail::class,
    \Clarence\Thumbnail\Thumbnail::class,
    \Clarence\Thumbnail\ScaleThumbnail::class,
    \Clarence\Thumbnail\EqualScaleCenterThumbnail::class,
    \Clarence\Thumbnail\EqualScaleTopLeftThumbnail::class,
];

try{
    foreach ($thumbnailTypes as $thumbnailType) {
        foreach ([1,2,3,4] as $i){
            $thumbnailBaseType = preg_replace('/^.*nail\\\\/', '', $thumbnailType);
            echo "[$thumbnailBaseType] Merging $i images... ", PHP_EOL;

            $thumbnail = call_user_func(array($thumbnailType, 'createFromImages'), array_slice($srcImages, 0, $i), 240, 320);
            $thumbnail->writeImage($outputDir."/{$i}-{$thumbnailBaseType}.jpg");
        }
    }
} catch (Exception $e){
    printf("%s: %s (%s)\n%s\n", get_class($e), $e->getMessage(), $e->getCode(), $e->getTraceAsString());
}

