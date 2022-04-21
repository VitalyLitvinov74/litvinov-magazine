<?php


namespace app\models\shop\product\image\contracts;


use vloop\PrintYourSelf\PrintYourSelf;

interface IProductGallery extends PrintYourSelf
{
    public function mergeGalleries(): IProductGallery;

    /**
     * @return IImage[]
     */
    public function images(): array;
}