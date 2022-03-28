<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IImage;
use app\models\shop\images\contracts\WeImages;
use vloop\entities\contracts\IForm;
use vloop\entities\yii2\queries\IImprovedQuery;

class ImagesSQL implements WeImages
{
    public function __construct(IImprovedQuery $query = null)
    {
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }

    public function addImages(IForm $imagesForm): WeImages
    {
        // TODO: Implement addImages() method.
    }

    /**
     * @return IImage[]
     */
    public function imagesList(): array
    {
        // TODO: Implement imagesList() method.
    }
}