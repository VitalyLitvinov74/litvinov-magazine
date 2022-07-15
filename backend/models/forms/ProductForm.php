<?php


namespace app\models\forms;


use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\AbstractForm;
use yii\base\Model;

class ProductForm extends AbstractForm
{
    public $price;
    public $count;

    public function rules()
    {
        return [
            [['price', 'count'], 'required'],
            ['price','number', 'min'=>0],
            ['count', 'integer', 'min'=>0]
        ];
    }
}