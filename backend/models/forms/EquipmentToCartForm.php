<?php

namespace app\models\forms;

use vloop\entities\yii2\AbstractForm;

class EquipmentToCartForm extends AbstractForm
{
    public $equipmentId;
    public $cartToken;
    public $customerToken;

    public function rules(): array
    {
        return [
            [['equipmentId', 'cartToken', 'customerToken'], 'required']
        ];
    }
}