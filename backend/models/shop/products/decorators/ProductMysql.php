<?php


namespace app\models\shop\products\decorators;


use app\models\contracts\IMedia;
use app\models\shop\products\contracts\IProduct;
use app\tables\Table;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;

class ProductMysql implements IProduct
{
    private $id;
    private $origin;

    public function __construct(IField $id, IProduct $product)
    {
        $this->id = $id;
        $this->origin = $product;
    }

    /**
     * @param IMedia $media - источник информации куда необходимо записать себя
     * @return IMedia - источник информации с только что записанными данными
     */
    public function printTo(IMedia $media): IMedia
    {
        return $this->origin
            ->printTo($media)
            ->add('id', $this->id->value());
    }

    /**
     * @param IField $newPrice
     * @return $this
     * @throws NotSavedData
     */
    public function changePrice(IField $newPrice): IProduct
    {
        $this->origin->changePrice($newPrice);
        $record = $this->record();
        $record->price = $newPrice->value();
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->errors, 422);
    }

    /**
     * @param IField $newCount
     * @return $this - меняет кол-во товара на складе.
     * @throws NotSavedData
     */
    public function changeCount(IField $newCount): IProduct
    {
        $this->origin->changeCount($newCount);
        $record = $this->record();
        $record->count = $newCount->value();
        if($record->save()){
            return $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * Удаляет продукт из бд, вместе со всеми зависимыми частями.
     */
    public function moveToTrash(): void
    {
        TableProducts::deleteAll(['id'=>$this->id->value()]);
    }

    private function record(): TableProducts
    {
        return new TableProducts([
            'isNewRecord' => false,
            'id' => $this->id->value()
        ]);
    }
}