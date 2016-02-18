# thumbnail 缩略图
A library for make multi images' thumbnail in PHP

用PHP写的一个生成多张图片的组合缩略图

# Examples 示例

Composite the following 4 images into a thumbnail:

将以下四张图组合起来生成一张缩略图：

1. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/1.jpg?raw=true)
2. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/2.jpg?raw=true)
3. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/3.jpg?raw=true)
4. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/4.jpg?raw=true)

Let's see the result firstly:

先看效果：

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/example.jpg?raw=true)

Then, the example codes:

再看代码：

```php
// file: test/example.php
$thumbnail = \clarence\thumbnail\Thumbnail::createFromImages($srcImages, 240, 320);
$thumbnail->writeImage($outputDir."/example.jpg");

```

Really pretty simple codes:

十分简单的代码~

`Thumbnail::createFromImages` is ussed to create the composited thumbnail. The first parameter is an array of original images' pathes; The second parameter is the thumbnail's width; The third parameter is the thumbnail's height; Then the image created is an instance of `Imagick` - so `writeImage` can be used to save it to a file.

`Thumbnail::createFromImages` 就是用于生成缩略图的关键函数，其第一个参数是原始图片的文件路径列表，第二个参数是生成的缩略图的宽度，第三个参数是生成的缩略图的高度；生成的图片是一个`Imagick`对象，然后可以使用`writeImage`将其保存到文件。


# Other thumbnail types 其他缩略图类型 

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/1-Thumbnail.jpg?raw=true) (1 image)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/2-Thumbnail.jpg?raw=true) (2 images)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/3-Thumbnail.jpg?raw=true) (3 images)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-Thumbnail.jpg?raw=true) (4 images)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-CropThumbnail.jpg?raw=true) (CropThumbnail)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-ScaleThumbnail.jpg?raw=true) (ScaleThumbnail)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-EqualScaleTopLeftThumbnail.jpg?raw=true) (EqualScaleTopLeftThumbnail)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-EqualScaleCenterThumbnail.jpg?raw=true) (EqualScaleCenterThumbnail)

