<?php
declare(strict_types=1);

namespace app\models\forms;

use vloop\entities\yii2\AbstractForm;

class EquipmentToWishlistForm extends AbstractForm
{
    public $wishlistToken;

    public $customerToken;

    public $equipmentId;

    public function rules(): array
    {
        return [
            [['equipmentId', 'customerToken', 'wishlistToken'], 'required'],
            [['customerToken', 'wishlistToken'], 'string'],
            ['equipmentId', 'integer']
        ];
    }
}