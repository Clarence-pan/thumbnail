# thumbnail ����ͼ
A library for make multi images' thumbnail in PHP
��PHPд��һ�����ɶ���ͼƬ���������ͼ

# Examples ʾ��

����������ͼ�����������һ������ͼ��

1. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/1.jpg?raw=true)
2. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/2.jpg?raw=true)
3. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/3.jpg?raw=true)
4. ![](https://github.com/Clarence-pan/thumbnail/blob/master/test/img/4.jpg?raw=true)

�ȿ�Ч����
![](https://github.com/Clarence-pan/thumbnail/blob/master/test/output/example.jpg?raw=true)

�ٿ����룺

```php
// file: test/example.php
\clarence\thumbnail\Thumbnail::createFromImages($srcImages, 240, 320)->writeImage($outputDir."/example.jpg");

```

ʮ�ּ򵥵Ĵ���~

`Thumbnail::createFromImages` ����������������ͼ�Ĺؼ����������һ��������ԭʼͼƬ���ļ�·���б��ڶ������������ɵ�����ͼ�Ŀ�ȣ����������������ɵ�����ͼ�ĸ߶ȣ����ɵ�ͼƬ��һ��`Imagick`����Ȼ�����ʹ��`writeImage`���䱣�浽�ļ���


