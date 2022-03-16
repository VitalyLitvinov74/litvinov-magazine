<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class Product implements IProduct
{
    private $fieldId;

    public function __construct(IField $fieldId)
    {
        $this->fieldId = $fieldId;
    }

    public function printYourSelf(): array
    {
        return [];
    }

    public function changeContent(IForm $changeDescriptionForm): IProduct
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function goodsPicking(): array
    {
        // TODO: Implement goodsPicking() method.
    }

    /**
     * @inheritDoc
     */
    public function characteristics(): array
    {
        // TODO: Implement characteristics() method.
    }
}