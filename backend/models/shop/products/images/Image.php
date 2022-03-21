<?php


namespace app\models\shop\products\images;


use app\tables\TableImages;
use vloop\entities\contracts\IField;

class Image implements IImage
{
    private $id;

    public function __construct(IFIeld $id)
    {
        $this->id = $id;
    }

    public function remove(): void
    {
        TableImages::deleteAll(['id'=>$this->id]);
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }
}