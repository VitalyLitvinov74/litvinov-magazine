<?php


namespace app\shop\stock;


use app\shop\contracts\ProductFormInterface;
use app\shop\exceptions\ProductException;
use app\shop\product\behaviors\products\DefaultAddableProductBehavior;
use app\shop\product\contracts\ProductsInterface;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;

class Warehouse implements WarehouseInterface

{
    public function __construct()
    {
    }

    /**
     * @param ProductFormInterface $productForm
     * @return TableProducts
     * @throws NotValidatedFields
     * @throws ProductException
     */
    public function addBy(ProductFormInterface $productForm): TableProducts
    {
        $addableEvent = ();
        return $addableEvent->addBy($productForm);
    }

    public function remove(IField $id): void
    {
        TableProducts::deleteAll(['id' => $id->asInt()]);
    }

    public function findOne(Query $query): TableProducts
    {
        $one = $query->one();
        if ($one) {
            return $one;
        }
        throw new NotFoundEntity('Не удалось найти карточку продукта');
    }

    /**
     * @return TableProducts[]
     */
    public function findAll(Query $query): array
    {
        return $query->all();
    }
}