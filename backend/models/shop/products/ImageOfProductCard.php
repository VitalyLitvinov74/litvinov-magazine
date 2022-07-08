<?php


namespace app\models\shop\products;


use app\models\contracts\IMedia;
use app\models\shop\products\contracts\IProductCard;
use app\models\shop\products\contracts\IProductImage;

class ImageOfProductCard implements IProductImage
{

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        
    }

    public function attachToProductCard(IProductCard $productCard): IProductImage
    {
        // TODO: Implement attachToProductCard() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }
}