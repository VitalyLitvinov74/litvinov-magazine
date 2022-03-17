<?php


namespace app\models\shop\products\info;


use app\models\shop\products\IProduct;

class ProductWithInfo implements IProductInfo
{
    public function __construct(IProduct $product)
    {

    }
}