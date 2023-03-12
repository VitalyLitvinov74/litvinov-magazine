<?php
declare(strict_types=1);

namespace app\models\forms\validators;

use yii\base\Model;
use yii\validators\Validator;

final class NestedValidatorAndConvertor extends Validator
{
    public $nestedForm;

    public function validateAttribute($model, $attribute)
    {
        /**@var Model $nestedForm*/
        $nestedForm = new $this->nestedForm;
        if(!$nestedForm instanceof Model){
            $this->addError($model, $attribute, 'Валидатор на вход принимает только Модели Yii2');
        }
        $nestedForm->load($model->$attribute, '') && $nestedForm->validate();
        if($nestedForm->hasErrors()){
            //подумать....
        }else{
            $model->$attribute = $nestedForm;
        }

    }
}