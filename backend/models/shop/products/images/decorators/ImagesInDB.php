<?php
namespace app\models\shop\products\images\decorators;

use app\models\shop\products\images\IImage;
use app\models\shop\products\images\WeImages;
use vloop\entities\contracts\IField;
use vloop\entities\yii2\criteria\IImprovedQuery;

class ImagesInDB implements WeImages
{
    private $query;
    private $origin;

    public function __construct(WeImages $origin, IImprovedQuery $query = null)
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

    public function image(IField $id): IImage
    {
        // TODO: Implement image() method.
    }

    /**
     * @param IImage[] $images
     * @return WeImages
     */
    public function mergeImages(array $images): WeImages
    {
        // TODO: Implement mergeImages() method.
    }

    /**
     * @return IImage[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }
}