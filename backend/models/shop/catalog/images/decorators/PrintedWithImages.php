<?php


namespace app\models\shop\catalog\images\decorators;


use app\models\shop\catalog\products\images\contracts\IProductImages;
use vloop\PrintYourSelf\PrintYourSelf;

class PrintedWithImages implements PrintYourSelf
{
    private $images;
    private $origin;

    public function __construct(PrintYourSelf $origin, IProductImages $images)
    {
        $this->images = $images;
        $this->origin = $origin;
    }

    public function printYourSelf(): array
    {
        return array_merge(
            $this->origin->printYourSelf(),
            [
                'images'=>$this->images->printYourSelf()
            ]
        );
    }
}