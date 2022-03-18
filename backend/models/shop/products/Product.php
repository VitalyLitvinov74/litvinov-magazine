<?php


namespace app\models\shop\products;


class Product implements IProduct
{

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }
}