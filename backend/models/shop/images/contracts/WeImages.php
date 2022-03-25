<?php


namespace app\models\shop\images\contracts;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeImages extends PrintYourSelf
{
    public function addImages(IForm $imagesForm): WeImages;

    /**
     * @return IImage[]
     */
    public function imagesList(): array;
}