<?php


namespace app\shop\categories;


use app\models\forms\CategoryForm;
use app\shop\categories\contracts\WeCategories;
use app\tables\TableCategories;
use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;

class Categories implements WeCategories
{
    /**
     * @param IForm|CategoryForm $productCardForm
     * @return TableProducts
     * @throws NotSavedData
     * @throws NotValidatedFields
     */
    public function add(IForm $productCardForm): TableCategories
    {
        $validatedFields = $productCardForm->validatedFields();
        $record = new TableCategories();
        $record->load($validatedFields);
        if ($record->save()) {
            return $record;
        }
        throw new NotSavedData($record->getErrors(), 400);
    }

    public function remove(IField $id): void
    {
        TableCategories::deleteAll(['id' => $id->asInt()]);
    }

    public function find()
    {

//        return new BaseQuery(TableCategories::class);
    }
}