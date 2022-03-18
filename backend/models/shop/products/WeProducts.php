<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProducts extends PrintYourSelf
{
    /**
     * @return IProduct[] //TODO: может быть возвращать семейство продуктов?
     */
    public function list(): array;

    public function addProduct(IForm $productForm): IProduct;
}