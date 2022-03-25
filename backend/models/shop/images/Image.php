<?php


namespace app\models\shop\images;


use app\models\shop\images\contracts\IImage;
use vloop\entities\contracts\IField;

class Image implements IImage
{
    public function __construct(string $path)
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

    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    public function rename(IField $newName): IImage
    {
        // TODO: Implement rename() method.
    }
}