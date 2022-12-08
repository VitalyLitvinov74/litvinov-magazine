<?php


namespace app\shop\product\card;


use app\models\forms\ProductCardForm;
use app\shop\product\card\contracts\IProductCard;
use app\shop\product\card\contracts\WeProductCards;
use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Query;
use yii\helpers\VarDumper;

class ProductCards
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
    public function add(IForm $productCardForm): IProductCard
    {
        $record = new TableProductCard();
        $record->load($productCardForm->validatedFields(), '');
        if($record->save()){
            return new ProductCard($record);
        }
        throw new NotSavedData($record->getErrors(),400);
    }

    public function remove(IField $id): void
    {
        TableProductCard::deleteAll(['id'=>$id->value()]);
    }

    /**
     * @param Query $query
     * @return array
     */
    public function findBy(Query $query): array
    {
        $cards = [];
        foreach ($query->all() as $record){
            $cards[] = new ProductCard($record);
        }
        return $cards;
    }
}