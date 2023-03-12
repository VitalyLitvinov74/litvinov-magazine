<?php


namespace app\models\forms;


use app\models\forms\validators\NestedValidatorAndConvertor;
use app\shop\contracts\ProductFormInterface;
use vloop\Yii2\Validators\CustomEachValidator;
use yii\base\Model;

class CreateProductForm extends Model implements ProductFormInterface
{
    public $description;
    public $shortDescription;
    public $title;
    public $equipments;
    public $characteristics;

    public function rules(): array
    {
        return [
            [['description', 'shortDescription', 'title'], 'required'],
            [['description', 'shortDescription', 'title'], 'string'],
            ['equipments', CustomEachValidator::class, 'rule'=>[
                NestedValidatorAndConvertor::class,
                'nestedForm'=>EquipmentForm::class
            ]],
            ['characteristics', CustomEachValidator::class, 'rule'=>[
                NestedValidatorAndConvertor::class,
                'nestedForm'=>CharacteristicForm::class
            ]]
        ];
    }
}