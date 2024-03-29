<?php


namespace app\shop\product;


use app\shop\exceptions\ProductException;
use app\shop\product\contracts\ProductsInterface;
use app\shop\product\states\products\addable\FinalStateOfAddableProduct;
use app\shop\product\states\products\InitialProductCollectionState;
use app\shop\product\struct\ProductStruct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;

class Products implements ProductsInterface
{

    public function __construct()
    {;
    }

    /**
     * @param IForm $productForm
     * @return TableProducts
     * @throws NotValidatedFields
     * @throws ProductException
     */
    public function add(IForm $productForm): TableProducts
    {
        $addableEvent = new InitialProductCollectionState(
            new FinalStateOfAddableProduct()
        );
        return $addableEvent->add($productForm);
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