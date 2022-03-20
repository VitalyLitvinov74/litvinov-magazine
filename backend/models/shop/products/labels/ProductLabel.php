<?php


namespace app\models\shop\products\labels;


use vloop\entities\contracts\IField;

class ProductLabel implements IProductLabel
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    /**
     * в основном используется при сравнении объектов.
     * @return string
     */
    public function __toString()
    {
        return $this->id->value();
    }

    public function changeDescription()
    {

    }

    public function changeTitle()
    {
        // TODO: Implement changeTitle() method.
    }

    public function changeShortDescription()
    {
        // TODO: Implement changeShortDescription() method.
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