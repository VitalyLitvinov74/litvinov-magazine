<?php


namespace app\models\forms;


use app\models\forms\validators\NestedValidatorAndConvertor;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotValidatedFields;
use vloop\entities\yii2\AbstractForm;
use vloop\Yii2\Validators\CustomEachValidator;
use yii\base\Model;

class EquipmentForm extends AbstractForm
{
    public $price;
    public $count;
    public $name;
    public $characteristics;

    public function rules()
    {
        return [
            [['price', 'count', 'name'], 'required'],
            ['price','number', 'min'=>0],
            ['count', 'integer', 'min'=>0],
            ['characteristics', CustomEachValidator::class, 'rule'=>[
                NestedValidatorAndConvertor::class,
                'nestedForm'=> CharacteristicForm::class
            ]]
        ];
    }
}