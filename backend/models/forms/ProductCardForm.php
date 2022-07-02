<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;

class ProductCardForm extends AbstractForm
{
    public $description;
    public $shortDescription;
    public $title;

    public function rules()
    {
        return [
            [['description', 'shortDescription', 'title'], 'required'],
            [['description', 'shortDescription', 'title'], 'string']
        ];
    }
}