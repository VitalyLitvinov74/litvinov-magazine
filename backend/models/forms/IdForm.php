<?php


namespace app\models\forms;


use vloop\entities\yii2\AbstractForm;

class IdForm extends AbstractForm
{
    public $id;

    public function rules()
    {
        return [
            ['id', "required"],
            ['id', 'integer']
        ];
    }
}