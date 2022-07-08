<?php


namespace app\models\shop\products\contracts;


use app\models\contracts\IPrinter;

interface IProductImage extends IPrinter
{
    public function attachToProductCard(IProductCard $productCard): self;

    public function remove();
}