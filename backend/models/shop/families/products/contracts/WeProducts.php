<?php


namespace app\models\shop\families\products\contracts;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProducts extends PrintYourSelf
{
    public function addProduct(IForm $productsForm): WeProducts;

    /**
     * @return IProduct[]
     */
    public function productList(): array;
}