<?php


namespace app\models\shop\products;


use app\models\currencies\ICurrency;
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

    public function changeDescription(IForm $changeDescriptionForm): IProduct
    {
        return $this;
    }

    public function changeAPrice(IField $newPrice, ICurrency $currency): IProduct
    {
        return $this;
    }

    public function changeCount(IField $currentCount): IProduct
    {
        return $this;
    }
}