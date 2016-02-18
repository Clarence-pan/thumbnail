# thumbnail ����ͼ
A library for make multi images' thumbnail in PHP

��PHPд��һ�����ɶ���ͼƬ���������ͼ

# Examples ʾ��

Composite the following 4 images into a thumbnail:

����������ͼ�����������һ������ͼ��

1. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/1.jpg?raw=true)
2. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/2.jpg?raw=true)
3. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/3.jpg?raw=true)
4. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/4.jpg?raw=true)

Let's see the result firstly:

�ȿ�Ч����

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/example.jpg?raw=true)

Then, the example codes:

�ٿ����룺

```php
// file: test/example.php
$thumbnail = \clarence\thumbnail\Thumbnail::createFromImages($srcImages, 240, 320);
$thumbnail->writeImage($outputDir."/example.jpg");

```

Really pretty simple codes:

ʮ�ּ򵥵Ĵ���~

`Thumbnail::createFromImages` is ussed to create the composited thumbnail. The first parameter is an array of original images' pathes; The second parameter is the thumbnail's width; The third parameter is the thumbnail's height; Then the image created is an instance of `Imagick` - so `writeImage` can be used to save it to a file.

`Thumbnail::createFromImages` ����������������ͼ�Ĺؼ����������һ��������ԭʼͼƬ���ļ�·���б��ڶ������������ɵ�����ͼ�Ŀ�ȣ����������������ɵ�����ͼ�ĸ߶ȣ����ɵ�ͼƬ��һ��`Imagick`����Ȼ�����ʹ��`writeImage`���䱣�浽�ļ���


# Other thumbnail types ��������ͼ���� 

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/1-Thumbnail.jpg?raw=true) (1 image)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/2-Thumbnail.jpg?raw=true) (2 images)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/3-Thumbnail.jpg?raw=true) (3 images)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-Thumbnail.jpg?raw=true) (4 images)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-CropThumbnail.jpg?raw=true) (CropThumbnail)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-ScaleThumbnail.jpg?raw=true) (ScaleThumbnail)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-EqualScaleTopLeftThumbnail.jpg?raw=true) (EqualScaleTopLeftThumbnail)

![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/4-EqualScaleCenterThumbnail.jpg?raw=true) (EqualScaleCenterThumbnail)

