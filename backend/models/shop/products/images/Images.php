<?php


namespace app\models\shop\products\images;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class Images implements WeImages
{

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

    public function mergeImages(IForm $imagesForm)
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