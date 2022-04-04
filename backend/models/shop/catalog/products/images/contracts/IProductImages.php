<?php


namespace app\models\shop\catalog\products\images\contracts;


use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use vloop\entities\contracts\IForm;

interface IProductImages extends IGallery
{
    /**
     * @param IForm $imagesForm
     * @return IProductImages - Новый объект галереи, с добавленными изображениями.
     */
    public function addImages(IForm $imagesForm): IProductImages;
}