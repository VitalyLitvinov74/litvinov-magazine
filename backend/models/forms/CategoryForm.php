<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;

class CategoryForm extends AbstractForm
{
    public string $name;

    public int $parentId;

    public function rules()
    {
        return [
            [['name', 'parentId'], 'required'],
            ['name', 'string'],
            ['parentId', 'number', 'min' => 1],
            ['parentId', 'integer']
        ];
    }
}