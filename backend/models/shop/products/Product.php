<?php


namespace app\models\shop\products;

use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;

/**
 * Class ProductModel
 * @package app\models\shop\products
 *          Описывает семейство продуктов.
 *          например есть семейство телефонов galaxy s3.
 *          но эти телефоны могут быть разных цветов, с разной ОП, процессорами.
 *          за окнкретный экземпляр отвечает объект @var Product
 */
class Product implements IProduct
{
    private $fieldId;

    public function __construct(IField $fieldId)
    {
        $this->fieldId = $fieldId;
    }

    /**
     * @param IForm $contentProductForm
     * @return IProduct
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function changeContent(IForm $contentProductForm): IProduct
    {
        $fields = $contentProductForm->validatedFields();
        $record = $this->record();
        if ($record->load($fields, '') and $record->save())
        {
            return clone $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @param IForm $imagesForm
     * @return IProduct - возвращает новый объект с измененным изображением.
     */
    public function changeImages(IForm $imagesForm): IProduct
    {
        return $this;
    }

    /**
     * @param IField $field
     * @return IProduct - продукт.
     * @throws NotSavedData
     */
    public function changeDefaultPrice(IField $field): IProduct
    {
        $record = $this->record();
        $record->default_price = $field->value();
        if($record->save()){
            return clone $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @param IField $field
     * @return IProduct
     * @throws NotSavedData
     */
    public function changeCount(IField $field): IProduct
    {
        $record = $this->record();
        $record->count = $field->value();
        if($record->save()){
            return clone $this;
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        $record = $this->record();
        $record->refresh();
        return $record->toArray();
    }

    private function record(): TableProducts
    {
        return new TableProducts([
            'id' => $this->fieldId->value(),
            'isNewRecord' => false
        ]);
    }
}