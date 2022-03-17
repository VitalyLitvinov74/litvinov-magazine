<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\WeProducts;
use app\models\shop\products\Product;
use vloop\entities\contracts\IForm;

class WithCharacteristics implements WeProducts
{
    private $origin;

    public function __construct(WeProducts $origin)
    {
        $this->origin = $origin;
    }

    public function add(IForm $productModelForm)
    {

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