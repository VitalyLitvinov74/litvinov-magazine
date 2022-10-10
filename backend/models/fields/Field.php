<?php


namespace app\models\fields;


class Field extends AbstractField
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }


    protected function value()
    {
        return $this->value;
    }
}