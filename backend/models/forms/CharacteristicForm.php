<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;

class CharacteristicForm extends AbstractForm
{
    public function rules()
    {
        return [
            [['value', 'name'], 'required']
        ];
    }
}