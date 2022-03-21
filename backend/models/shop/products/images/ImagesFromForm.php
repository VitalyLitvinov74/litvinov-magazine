<?php


namespace app\models\shop\products\images;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class ImagesFromForm implements WeImages
{

    /**
     * ImagesFromForm constructor.
     * @param IForm $imagesForm
     */
    public function __construct(IForm $imagesForm)
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
        // TODO: Implement addImages() method.
    }

    /**
     * @return IImage[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }
}