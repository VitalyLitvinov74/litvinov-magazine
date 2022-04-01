<?php


namespace app\models\shop\product\contracts;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProductsCards extends PrintYourSelf
{
    /**
     * @return IProductCard[]
     */
    public function list(): array;

    public function addProductCard(IForm $cardForm): IProductCard;
}