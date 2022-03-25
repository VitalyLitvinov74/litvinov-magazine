<?php


namespace app\models\shop\images\decorators;


use app\models\shop\images\contracts\IImage;
use app\tables\TableFamiliesImages;
use vloop\entities\contracts\IField;

class CachedImage implements IImage
{
    public function __construct(IImage $origin, TableFamiliesImages $record)
    {
    }

    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    public function rename(IField $newName): IImage
    {
        // TODO: Implement rename() method.
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}