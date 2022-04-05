<?php


namespace app\models\shop\catalog\images\decorators;


use app\models\shop\catalog\products\images\contracts\IProductImages;
use app\models\shop\images\contracts\IGallery;
use app\models\shop\images\contracts\IImage;
use vloop\PrintYourSelf\PrintYourSelf;

class PrintedWithImages implements PrintYourSelf
{
    private $images;
    private $origin;

    public function __construct(PrintYourSelf $origin, IGallery $images)
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