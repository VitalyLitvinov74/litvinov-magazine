<?php


namespace app\models\shop\products;


use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\fields\Field;
use vloop\entities\yii2\criteria\IImprovedQuery;
use vloop\entities\yii2\criteria\InTable;

class Products implements WeProducts
{
    private $query;

    public function __construct(IImprovedQuery $query = null)
    {
        if(is_null($query)){
            $this->__construct(new InTable(TableProducts::class));
        }
        $this->query = $query;
    }

    /**
     * @param IForm $productModelForm
     * @return Product
     * @throws NotValidatedFields
     * @throws NotSavedData
     */
    public function add(IForm $productModelForm): IProduct
    {
        $fields = $productModelForm->validatedFields();
        $record = new TableProducts([
            'default_price' => $fields['price'],
            'count' => $fields['count'],
            'title' => $fields['title'],
            'descriptions' => $fields['description'],
            'short_desc' => $fields['shortDescription']
        ]);
        if ($record->save()) {
            return $this->product(
                new Field('id', $record->id)
            );
        }
        throw new NotSavedData($record->getErrors(), 422);
    }

    /**
     * @return Product[]
     */
    public function list(): array
    {
        $list = [];
        foreach ($this->query->queryOfSearch()->each() as $productRecord) {
            /**@var TableProducts $productRecord */
            $productId = new Field('id', $productRecord->id);
            $list[$productId->value()] = $this->product(
                $productId
            );
        }
        return $list;
    }

    /**
     * Печатает List в виде вложенного массива
     * @return array
     */
    public function printYourSelf(): array
    {
        $self = [];
        foreach ($this->list() as $item){
            $self[] = $item->printYourSelf();
        }
        return $self;
    }

    public function product(IField $fieldId): IProduct
    {
        return new Product(
            $fieldId
        );
    }
}