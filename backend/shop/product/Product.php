<?php

namespace app\shop\product;

use app\shop\product\contracts\ProductInterface;
use app\shop\product\events\DefaultProductBehavior;
use app\shop\product\events\ChangeOrAddProductToCategoryBehavior;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;

class Product implements ProductInterface
{
    public static function byId(IField $id): self
    {
        $record = TableProducts::find()->where(['id' => $id->asInt()])->one();
        if ($record) {
            return new self($record);
        }
        throw new NotFoundEntity("Карточки продукта с таким id=" . $id->asInt() . " не найдено");
    }

    public function __construct(private TableProducts $record)
    {

    }

    /**
     * @param IForm $form
     * @return $this
     */
    public function changeInformation(ProductStruct $productStruct): ProductInterface
    {
        $productChangeEvent =
            new ChangeOrAddProductToCategoryBehavior(
                new DefaultProductBehavior(
                    $this->record
                ),
                $this->record
            );
        return $productChangeEvent->changeInformation($productStruct);
    }
}