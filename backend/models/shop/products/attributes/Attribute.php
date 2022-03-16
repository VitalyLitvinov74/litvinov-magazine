<?php


namespace app\models\shop\products\attributes;


use vloop\entities\contracts\IField;

class Attribute implements  IAttribute
{
    private $fieldId;

    public function __construct(IField $field)
    {
        $this->fieldId = $field;
    }

    public function printYourSelf(): array
    {

    }

    /**
     * @inheritDoc
     */
    public function value(): string
    {
        // TODO: Implement value() method.
    }
}