<?php


namespace app\models\shop\product;


use app\models\shop\product\contracts\IProduct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\fields\Field;
use vloop\PrintYourSelf\PrintYourSelf;

class ProductByID implements IProduct
{
    private $productID;

    public function __construct(IField $productID)
    {
        $this->productID = $productID;
    }

    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void
    {
        $this->record()->delete();
    }

    /**
     * @return TableProducts
     */
    private function record(): TableProducts{
        return new TableProducts([
            'id'=>$this->productID->value(),
            'isNewRecord' => false
        ]);
    }

    /**
     * @param IField $newPrice - - число умноженное на 100
     * @return IProduct
     * @throws NotSavedData
     */
    public function changePrice(IField $newPrice): IProduct
    {
        $record = $this->record();
        $record->price = $newPrice->value();
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @param IField $newCount - кол-во товара гтоового к продаже (с учетом брони).
     * @return IProduct
     * @throws NotSavedData
     */
    public function changeCount(IField $newCount): IProduct
    {
        $record = $this->record();
        $record->count = $newCount->value();
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * Копирует текущий объект в систему.
     * @return IProduct
     * @throws NotSavedData
     */
    public function copyToSystem(): IProduct
    {
        $record = $this->record();
        $record->refresh();
        $new = new TableProducts([
            'count'=>$record->count,
            'price' => $record->price
        ]);
        if($new->save()){
            return new ProductByID(
                new Field('id', $new->id)
            );
        }
        throw new NotSavedData($new->getErrors(), 422);
    }
}