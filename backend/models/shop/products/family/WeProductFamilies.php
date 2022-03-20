<?php


namespace app\models\shop\products\family;


use app\models\shop\products\descriptions\IProductLabel;
use app\models\shop\products\IProduct;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProductFamilies extends PrintYourSelf
{
    /**
     * @param IProductLabel $productLabel
     * @param IProduct[]         $products
     * @return IProductFamily
     */
    public function add(IProductLabel $productLabel, array $products): IProductFamily;

    /**
     * @return IProductFamily
     */
    public function showAll(): IProductFamily;
}