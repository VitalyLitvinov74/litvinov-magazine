<?php


namespace app\models\shop\product\characteristics;


use app\models\shop\product\characteristics\contracts\ICharacteristic;
use vloop\entities\contracts\IField;

class ProductCharacteristic implements ICharacteristic
{
    private $id;

    public function __construct(IField $characteristicID)
    {
        $this->id = $characteristicID;
    }

    public function changeKey(): string
    {

    }

    public function changeValue(): string
    {
        // TODO: Implement changeValue() method.
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