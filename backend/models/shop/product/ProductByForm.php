<?php


namespace app\models\shop\product;


use app\models\forms\ProductsForm;
use app\models\shop\product\contracts\IProduct;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;

class ProductByForm implements IProduct
{
    private $form;

    /**
     * ProductByForm constructor.
     * @param IForm|ProductsForm $form
     */
    public function __construct(IForm $form)
    {
        $this->form = $form;
    }

    /**
     * @param IField $newPrice - - число умноженное на 100
     * @return IProduct
     */
    public function changePrice(IField $newPrice): IProduct
    {
        $form = $this->form;
        $form->price = $newPrice->value();
        return new self($form);
    }

    /**
     * @param IField $newCount - кол-во товара гтоового к продаже (с учетом брони).
     * @return IProduct
     */
    public function changeCount(IField $newCount): IProduct
    {
        $form = $this->form;
        $form->count = $newCount->value();
        return new self($form);
    }

    /**
     * Копирует текущий объект в систему.
     * @return IProduct
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function copyToSystem(): IProduct
    {
        $fields = $this->form->validatedFields();
        $record = new TableProducts([
            'price' => $fields['price'],
            'count' => $fields['count']
        ]);
        if($record->save()){
            return new ProductByID(
                new Field('id',$record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void
    {
        $this->__destruct();
    }

    public function __destruct()
    {
    }
}