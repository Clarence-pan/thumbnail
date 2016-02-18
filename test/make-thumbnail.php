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
    \clarence\thumbnail\CropThumbnail::class,
    \clarence\thumbnail\Thumbnail::class,
    \clarence\thumbnail\ScaleThumbnail::class,
    \clarence\thumbnail\EqualScaleCenterThumbnail::class,
    \clarence\thumbnail\EqualScaleTopLeftThumbnail::class,
];

try{
    foreach ($thumbnailTypes as $thumbnailType) {
        foreach ([1,2,3,4] as $i){
            $thumbnailBaseType = preg_replace('/^.*nail\\\\/', '', $thumbnailType);
            echo "[$thumbnailBaseType] Merging $i images... ", PHP_EOL;

            // 生成缩略图并写入文件
            $thumbnail = call_user_func(array($thumbnailType, 'createFromImages'), array_slice($srcImages, 0, $i), 240, 320);
            $thumbnail->writeImage($outputDir."/{$i}-{$thumbnailBaseType}.jpg");
        }
    }
} catch (Exception $e){
    printf("%s: %s (%s)\n%s\n", get_class($e), $e->getMessage(), $e->getCode(), $e->getTraceAsString());
}

