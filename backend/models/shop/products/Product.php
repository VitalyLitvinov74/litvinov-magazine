<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IField;

class Product implements IProduct
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->id->value();
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        return [];
    }
}