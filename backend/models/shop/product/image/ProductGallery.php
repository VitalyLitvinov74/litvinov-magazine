<?php


namespace app\models\shop\product\image;


use app\models\shop\product\image\contracts\IImage;
use app\models\shop\product\image\contracts\IProductGallery;
use vloop\entities\contracts\IField;

class ProductGallery implements IProductGallery
{
    private $productID;

    public function __construct(IField $productID)
    {
        $this->productID = $productID;
    }

    public function mergeGalleries(): IProductGallery
    {

    }

    /**
     * @return IImage[]
     */
    public function images(): array
    {
        // TODO: Implement images() method.
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        $selfy = [];
        foreach ($this->images() as $image){
            $selfy[] = $image->printYourSelf();
        }
        return $selfy;
    }
}