<?php

namespace app\shop\product;

use app\shop\product\contracts\IProduct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;

class Product implements IProduct
{
    public static function byId(IField $id): self
    {
        $record = TableProducts::find()->where(['id' => $id->asInt()])->one();
        if ($record) {
            return new self($record);
        }
        throw new NotFoundEntity("Карточки продукта с таким id=" . $id->asInt() . " не найдено");
    }

    public function __construct(private TableProducts $record)
    {

    }

    /**
     * @param IForm $form
     * @return $this
     * @throws NotValidatedFields|NotSavedData
     */
    public function change(IForm $form): IProduct
    {
        $this->record->load($form->validatedFields(), '');
        if($this->record->save()){
            return $this;
        }
        throw new NotSavedData($this->record->getErrors(), 422);
    }
}