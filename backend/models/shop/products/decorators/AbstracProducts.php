<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\WeProducts;

abstract class AbstracProducts implements WeProducts
{
    public function printYourSelf(): array
    {
        $self = [];
        foreach ($this->list() as $product){
            $self[] = $product->printYourSelf();
        }
        return $self;
    }
}