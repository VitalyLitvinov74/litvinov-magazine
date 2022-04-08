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
            [['title', 'description', 'shortDescription'], 'required'],
            [['title', 'description', 'shortDescription'], 'string', 'min' => 1]
        ];
    }
}