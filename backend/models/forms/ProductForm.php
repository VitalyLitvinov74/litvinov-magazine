<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;

class ProductForm extends AbstractForm
{
    public $price;
    public $count;
    public $vendorCode;

    public function rules()
    {
        return [
            [['count', 'price', 'vendorCode'], 'required'],
            ['count', 'integer', 'min'=> 0],
            ['price', 'number', 'min' => 0],
            ['vendorCode', 'string']
        ];
    }
}