<?php

namespace app\shop\product;

use app\shop\contracts\ProductFormInterface;
use app\shop\exceptions\ProductException;
use app\shop\product\contracts\ProductInterface;
use app\shop\product\behaviors\product\RelateWithCategoryBehavior;
use app\shop\product\behaviors\product\DefaultProductBehavior;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;

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
     * @param ProductFormInterface $productForm
     * @return $this
     * @throws ProductException
     */
    public function changeInformation(ProductFormInterface $productForm): ProductInterface
    {
        $productChangeEvent =
//            new RelateWithCategoryBehavior(
                new DefaultProductBehavior(
                    $this->record
//                ),
//                $this->record
            );
        return $productChangeEvent->changeInformation($productStruct);
    }
}