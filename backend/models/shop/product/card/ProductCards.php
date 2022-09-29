<?php


namespace app\models\shop\product\card;


use app\models\forms\ProductCardForm;
use app\models\shop\product\card\contracts\WeProductCards;
use app\tables\RowProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
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
     * @return RowProductCard
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function add(IForm $productCardForm): RowProductCard
    {
        $record = new RowProductCard();
        $record->setAttributes($productCardForm->validatedFields());
        if($record->save()){
            return $record;
        }
        throw new NotSavedData($record->getErrors(),400);
    }

    public function remove(IField $id): void
    {
        RowProductCard::deleteAll(['id'=>$id->value()]);
    }

    public function find(): Query
    {
        return RowProductCard::find();
    }
}