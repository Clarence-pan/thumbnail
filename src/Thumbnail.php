<?php

namespace Clarence\Thumbnail;

class Thumbnail extends \Imagick
{
    /**
     * @param array $images
     * @param int $width
     * @param int $height
     * @return static
     * @throws ThumbnailException
     */
    public static function createFromImages($images, $width, $height){
        if (empty($images)){
            throw new ThumbnailException("No images!");
        }

        $thumbnail = new static();
        $thumbnail->newImage($width, $height, 'white', 'jpg');
        $thumbnail->compositeImages($images);

        return $thumbnail;
    }

    public function compositeImages($images){
        $imagesKeys = array_keys($images);
        $compositeConfig = $this->calcCompositeImagesPosAndSize($images);

        foreach ($compositeConfig as $index => $cfg){
            $imgKey = $imagesKeys[$index];
            $img = new \Imagick($images[$imgKey]);
            $img = $this->makeCompositeThumbnail($img, $cfg);
            $this->compositeImage($img, self::COMPOSITE_OVER, $cfg['to']['x'], $cfg['to']['y']);
        }
    }

    protected function makeCompositeThumbnail(\Imagick $img, $cfg){
        $img->cropThumbnailImage($cfg['size']['width'], $cfg['size']['height']);
        return $img;
    }

    protected function calcCompositeImagesPosAndSize($images){
        $width = $this->getImageWidth();
        $height = $this->getImageHeight();

        switch(count($images)){
            case 0:
                throw new ThumbnailException("No images!");
            case 1:
                // | 0 |
                return [
                    0 => [
                        'to' => [ 'x' => 0, 'y' => 0 ],
                        'size' => [
                            'width' => $width,
                            'height' => $height,
                        ]
                    ]
                ];
            case 2:
                // | 0 | 1 |
                return [
                    0 => [
                        'to' => [ 'x' => 0, 'y' => 0 ],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height,
                        ]
                    ],
                    1 => [
                        'to' => [ 'x' => $width / 2, 'y' => 0],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height,
                        ]
                    ]
                ];
            case 3:
                // | 0 | 1 |
                // | 2 |   |
                return [
                    0 => [
                        'to' => [ 'x' => 0, 'y' => 0 ],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height / 2,
                        ]
                    ],
                    1 => [
                        'to' => [ 'x' => $width / 2, 'y' => 0],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height,
                        ]
                    ],
                    2 => [
                        'to' => [ 'x' => 0, 'y' => $height / 2 ],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height / 2,
                        ]
                    ],
                ];
            default:
                // >= 4:
                // | 0 | 1 |
                // | 2 | 3 |
                return [
                    0 => [
                        'to' => [ 'x' => 0, 'y' => 0 ],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height / 2,
                        ]
                    ],
                    1 => [
                        'to' => [ 'x' => $width / 2, 'y' => 0],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height / 2,
                        ]
                    ],
                    2 => [
                        'to' => [ 'x' => 0, 'y' => $height / 2 ],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height / 2,
                        ]
                    ],
                    3 => [
                        'to' => [ 'x' => $width / 2, 'y' => $height / 2],
                        'size' => [
                            'width' => $width / 2,
                            'height' => $height / 2,
                        ]
                    ],
                ];
        }
    }
}

/**
 * 从左上角裁剪
 * Class CropThumbnail
 * @package thumbnail
 */
class CropThumbnail extends Thumbnail
{
    protected function makeCompositeThumbnail(\Imagick $img, $cfg){
        $img->cropImage($cfg['size']['width'], $cfg['size']['height'], 0, 0);
        return $img;
    }
}

/**
 * 拉伸的缩略图
 * Class ScaleThumbnail
 * @package thumbnail
 */
class ScaleThumbnail extends Thumbnail
{
    protected function makeCompositeThumbnail(\Imagick $img, $cfg){
        $img->thumbnailImage($cfg['size']['width'], $cfg['size']['height']);
        return $img;
    }
}

/**
 * 等比例缩放,然后从左上角裁剪
 * Class CropThumbnail
 * @package thumbnail
 */
class EqualScaleTopLeftThumbnail extends Thumbnail
{
    protected function makeCompositeThumbnail(\Imagick $img, $cfg){
        $maxWidth = $cfg['size']['width'];
        $maxHeight = $cfg['size']['height'];

        $imgWidth = $img->getImageWidth();
        $imgHeight = $img->getImageHeight();

        if ($maxHeight * 1.0 / floatval($maxWidth) > $imgHeight * 1.0 / floatval($imgWidth)){
            $scaleHeight = $maxHeight;
            $scaleWidth = $imgWidth  * $maxHeight * 1.0 / floatval($imgHeight);
        } else {
            $scaleWidth = $maxWidth;
            $scaleHeight = $imgHeight * $maxWidth * 1.0 / floatval($imgWidth);
        }

        $img->cropThumbnailImage(intval($scaleWidth), intval($scaleHeight));
        $img->cropImage($maxWidth, $maxHeight, 0, 0);
        return $img;
    }
}

/**
 * 等比例缩放,然后从中间裁剪
 * Class CropThumbnail
 * @package thumbnail
 */
class EqualScaleCenterThumbnail extends Thumbnail
{
    protected function makeCompositeThumbnail(\Imagick $img, $cfg){
        $maxWidth = $cfg['size']['width'];
        $maxHeight = $cfg['size']['height'];

        $imgWidth = $img->getImageWidth();
        $imgHeight = $img->getImageHeight();

        if ($maxHeight * 1.0 / floatval($maxWidth) > $imgHeight * 1.0 / floatval($imgWidth)){
            $scaleHeight = $maxHeight;
            $scaleWidth = $imgWidth  * $maxHeight * 1.0 / floatval($imgHeight);
        } else {
            $scaleWidth = $maxWidth;
            $scaleHeight = $imgHeight * $maxWidth * 1.0 / floatval($imgWidth);
        }

        $img->cropThumbnailImage(intval($scaleWidth), intval($scaleHeight));
        $img->cropImage($maxWidth, $maxHeight, ($scaleWidth - $maxWidth) / 2, ($scaleHeight - $maxHeight) / 2);
        return $img;
    }
}

class ThumbnailException extends \Exception { }
