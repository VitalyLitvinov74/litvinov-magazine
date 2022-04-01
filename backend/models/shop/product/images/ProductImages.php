<?php


namespace app\models\shop\product\images;


use app\models\shop\product\contracts\IProductCard;
use app\models\shop\product\images\contracts\IImage;
use app\models\shop\product\images\contracts\WeImages;
use vloop\entities\contracts\IForm;

class ProductImages implements WeImages
{
    private $productCard;

    public function __construct(IProductCard $productCard)
    {
        $this->productCard = $productCard;
    }

    /**
     * @return IImage[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }

    public function loadImages(IForm $imagesForm): WeImages
    {
        // TODO: Implement loadImages() method.
    }
}