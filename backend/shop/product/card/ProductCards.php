<?php


namespace app\shop\product\card;


use app\models\forms\ProductCardForm;
use app\shop\product\card\contracts\IProductCard;
use app\shop\product\card\contracts\WeProductCards;
use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;
use yii\helpers\VarDumper;

class ProductCards implements WeProductCards

{
    public function __construct()
    {
    }

    /**
     * @param IForm|ProductCardForm $productCardForm
     * @return IProductCard
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function add(IForm $productCardForm): TableProductCard
    {
        $record = new TableProductCard();
        $record->load($productCardForm->validatedFields(), '');
        if($record->save()){
            return $record;
        }
        throw new NotSavedData($record->getErrors(),400);
    }

    public function remove(IField $id): void
    {
        TableProductCard::deleteAll(['id'=>$id->value()]);
    }

    public function findOne(Query $query): TableProductCard
    {
        $one = $query->one();
        if($one){
            return $one;
        }
        throw new NotFoundEntity('Не удалось найти карточку продукта');
    }

    /**
     * @return TableProductCard[]
     */
    public function findAll(Query $query): array
    {
        return $query->all();
    }
}