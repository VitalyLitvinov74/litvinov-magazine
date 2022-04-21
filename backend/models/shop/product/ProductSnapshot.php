<?php


namespace app\models\shop\product;


use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\PrintYourSelf\PrintYourSelf;

class ProductSnapshot implements PrintYourSelf
{
    private $productID;

    public function __construct(IField $productID)
    {
        $this->productID = $productID;
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     * @throws NotFoundEntity
     */
    public function printYourSelf(): array
    {
        $record = TableProducts::find()
            ->where(['id' => $this->productID->value()])
            ->one();
        if ($record) {
            return [
                'id' => $record->id,
                'count' => $record->count,
                'price' => $record->price
            ];
        }
        throw new NotFoundEntity('Не удалось найти продукт с ID=' . $this->productID->value());
    }
}