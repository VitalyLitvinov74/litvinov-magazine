<?php


namespace app\models\shop\products;


use app\models\forms\ProductCardForm;
use app\models\shop\products\contracts\IProductCard;
use app\tables\TableProductCards;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class ProductCardByPost implements IProductCard
{

    private $productForm;

    /**
     * ProductCardByPost constructor.
     * @param IForm|ProductCardForm $productForm
     */
    public function __construct(IForm $productForm)
    {
        $this->productForm = $productForm;
    }

    public function changeDescriptions(IForm $descriptionForm): IProductCard
    {
        return new self($descriptionForm);
    }

    public function changeTitle(IField $newTitle): IProductCard
    {
        $this->productForm->title = $newTitle->value();
        return new self($this->productForm);
    }

    public function copyToSystem(): IProductCard
    {
        $fields = $this->productForm->validatedFields();
        $record = new TableProductCards([
            'title' => $fields['title'],
            'short_description' => $fields['shortDescription'],
            'description' => $fields['description'],
        ]);
        if ($record->save()) {
            return new ProductCard(
                new Field('id', $record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     * @throws NotValidatedFields
     */
    public function printYourSelf(): array
    {
        $fields = $this->productForm->validatedFields();
        return [
            'title' => $fields['title'],
            'description' => $fields['description'],
            'shortDescription' => $fields['shortDescription']
        ];
    }

    /**
     * Выкидывает текущий элемент из системы.
     */
    public function moveToTrash(): void
    {
        $this->__destruct();
    }

    public function __destruct()
    {

    }
}