<?php


namespace app\models\shop\products\decorators;

use app\models\shop\products\WeProducts;
use app\models\shop\products\Product;
use vloop\entities\contracts\IForm;

class WithImages implements WeProducts
{
    public function __construct(WeProducts $origin)
    {
    }

    public function add(IForm $productModelForm)
    {
        // TODO: Implement add() method.
    }

    /**
     * @return Product[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}