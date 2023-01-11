<?php

namespace app\models\forms;

use vloop\entities\yii2\AbstractForm;

class AddToCartForm extends AbstractForm
{
    public $equipmentId;
    public $cartToken;

    public function rules(): array
    {
        return [
            [['equipmentId', 'cartToken'], 'required']
        ];
    }
}