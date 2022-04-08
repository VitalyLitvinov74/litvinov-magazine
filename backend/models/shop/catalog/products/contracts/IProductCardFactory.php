<?php


namespace app\models\shop\catalog\products\contracts;


use vloop\entities\contracts\IForm;

interface IProductCardFactory
{
    public function createProductCard(IForm $form): IProductCard;
}