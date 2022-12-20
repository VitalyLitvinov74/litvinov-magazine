<?php

namespace app\shop\product\card;

use app\models\forms\ProductForm;
use app\shop\product\card\contracts\IProductCard;
use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use yii\db\Exception;

class ProductCard implements IProductCard
{
    public static function byId(IField $id): self
    {
        $record = TableProductCard::find()->where(['id' => $id->asInt()])->one();
        if ($record) {
            return new self($record);
        }
        throw new NotFoundEntity("Карточки продукта с таким id=" . $id->asInt() . " не найдено");
    }

    public function __construct(private TableProductCard $record)
    {

    }

    /**
     * @param IForm $form
     * @return $this
     * @throws NotValidatedFields|NotSavedData
     */
    public function change(IForm $form): IProductCard
    {
        $this->record->load($form->validatedFields(), '');
        if($this->record->save()){
            return $this;
        }
        throw new NotSavedData($this->record->getErrors(), 422);
    }
}