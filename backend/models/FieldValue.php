<?php


namespace app\models;


use vloop\entities\contracts\IField;

class FieldValue implements IField
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function value(): string
    {
        return (string) $this->value;
    }

    /**
     * @inheritDoc
     */
    public function printYourSelf(): array
    {
        return ['value'=>$this->value()];
    }
}