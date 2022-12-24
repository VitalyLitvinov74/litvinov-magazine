<?php


namespace app\shop\product;


use app\models\forms\ProductCardForm;
use app\shop\product\contracts\IProduct;
use app\shop\product\contracts\WeProducts;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;

class Products implements WeProducts

{
    public function __construct()
    {
    }

    /**
     * @param IForm|ProductCardForm $productCardForm
     * @return IProduct
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function add(IForm $productCardForm): TableProducts
    {
        $record = new TableProducts();
        $record->load($productCardForm->validatedFields(), '');
        if($record->save()){
            return $record;
        }
        throw new NotSavedData($record->getErrors(),400);
    }

    public function remove(IField $id): void
    {
        TableProducts::deleteAll(['id'=>$id->value()]);
    }

    public function findOne(Query $query): TableProducts
    {
        $one = $query->one();
        if($one){
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